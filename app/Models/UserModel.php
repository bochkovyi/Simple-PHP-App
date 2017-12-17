<?php

namespace App\Models;

class UserModel
{
    private static $instance = null;
    private static $dbName = 'users_db.json';

    private function __clone() {}
    private function __construct() {}

    public static function getInstance() {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$instance->init();
        }

        return self::$instance;
    }
    
    private function init() {
        if (!file_exists(APP_LOCATION . self::$dbName)) {
            $this->saveToDb(array());
        }
    }

    public function validateUserInput($data) {
        if (empty($data) || empty($data['username']) || empty($data['password'])) {
            return false;
        }
        return true;
    }

    public function getByUsername($username) {
        return $this->getUser('username', $username);
    }

    public function getUser($key, $value) {
        foreach ($this->getUsers() as $user) {
            if (isset($user[$key]) && $user[$key] === $value) {
                return $user;
            }
        }
        return false;
    }

    public function getUsers() {
        return json_decode(file_get_contents(APP_LOCATION . self::$dbName), true);
    }

    public function addUser($data) {
        $users = $this->getUsers();
        if (count($users) === 0) {
            $id = 1;
        } else {
            $id = $users[count($users)-1]['_id'] + 1;
        }

        $newUser = array_merge(array('_id' => $id), $data);
        $newUser['created'] = time();
        $newUser['modified'] = time();
        $users[] =  $newUser;
        $this->saveToDb($users);
    }

    public function editUser($userId, $newData) {
        $allUsers = $this->getUsers();
        foreach ($allUsers as &$user) {
            if (isset($user['_id']) && $user['_id'] === $userId) {

                $updatedUser = array_merge(array('_id' => $userId), $newData);
                $updatedUser['created'] = $user['created'];
                $updatedUser['modified'] = time();
                $user = $updatedUser;
                return $this->saveToDb($allUsers);
            }
        }
        return false;
    }

    private function saveToDb($data) {
        return false !== file_put_contents(APP_LOCATION . self::$dbName, json_encode($data, JSON_PRETTY_PRINT));
    }


}