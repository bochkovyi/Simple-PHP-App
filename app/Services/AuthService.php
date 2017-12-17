<?php

namespace App\Services;
use App\Models\UserModel;

class AuthService
{
    private static $instance = null;
    private $userModel;

    private function __clone() {}
    private function __construct() {}

    public static function getInstance() {
        if (null === self::$instance)
        {
            session_start();
            self::$instance = new self();
            self::$instance->userModel = UserModel::getInstance();
        }

        return self::$instance;
    }

    public function setGlobalAuthState($bool) {
        $GLOBALS['isLoggedIn'] = $bool;
    }

    public function passwordValidate($user, $password) {
        if (isset($user['locked_until']) && $user['locked_until'] > time()) {
            $locked =  $user['locked_until'] - time();
            $minutes = floor($locked / 60);
            $seconds = $locked - $minutes * 60;

            if ($minutes > 1) {
                $message = "$minutes minutes $seconds seconds";
            } else if ($minutes == 1) {
                $message = "$minutes minute $seconds seconds";
            } else {
                console($minutes);
                $message = "$seconds seconds";
            }

            return "Please try again after $message";
        } else {
            if ($user['password'] === $password) {
                return true;
            } else {
                $attempts = isset($user['login_attempts']) ? $user['login_attempts'] + 1 : 1;
                console($attempts);
                $user['login_attempts'] = $attempts;
                if ($attempts >= 3) {
                    $user['locked_until'] = time() + 60 * 5;
                    unset($user['login_attempts']);
                }
                $this->userModel->editUser($user['_id'], $user);
                return "Password is incorrect";
            }
        }
    }

    public function isLoggedIn() {
        $authResult = isset($_SESSION['username']) && false !== $this->userModel->getByUsername($_SESSION['username']);
        $this->setGlobalAuthState($authResult);
        return $authResult;
    }

    public function logUserIn($username) {
        $user = $this->userModel->getByUsername($username);
        $user['login_time'] = time();
        unset($user['login_attempts']);
        unset($user['locked_until']);
        $this->userModel->editUser($user['_id'], $user);

        $_SESSION['username'] = $username;
        $this->setGlobalAuthState(true);
    }

    public function logUserOut() {
        $_SESSION['username'] = false;
        $this->setGlobalAuthState(false);
    }

}