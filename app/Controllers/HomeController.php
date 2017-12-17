<?php

namespace App\Controllers;
use App\Services\AuthService;
use App\Models\UserModel;

class HomeController
{
    private $authService;
    public function __construct() {
        $this->authService = AuthService::getInstance();
        $this->userModel = UserModel::getInstance();
    }

    public function home() 
    {
        $this->redirectToLoginIfNotAuthorised();
        view('home.home', array("username" => $_SESSION['username']));
    }

    public function login() 
    {
        $this->redirectToHomeIfAuthorised();

        //$this->userModel->editUser(3, ["username" => "DOG OWNER", "test" => "testsdgsdg"]);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validationResult = $this->userModel->validateUserInput($_POST);
            if (!$validationResult) {
                view('common.error', ['message' => 'Please fill all fields']);
            } else {
                $user = $this->userModel->getByUsername($_POST['username']);
                
                if ($user === false) {
                    view('common.error', ['message' => 'Username not found']);
                }

                $validationResult = $this->authService->passwordValidate($user, $_POST['password']);

                if ($validationResult === true) {
                    $this->authService->logUserIn($_POST['username']);

                    redirect('home');

                } else {
                    view('common.error', ['message' => $validationResult]);
                }
            }
        } else {
            view('home.login');
        }
    }

    public function register() 
    {
        $this->redirectToHomeIfAuthorised();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validationResult = $this->userModel->validateUserInput($_POST);
            if (!$validationResult) {
                view('common.error', ['message' => 'Please fill all fields']);
            } else {
                if (false !== $this->userModel->getByUsername($_POST['username'])) {
                    view('common.error', ['message' => 'Sorry, user already exists']);
                }
                $this->userModel->addUser($_POST);
                $this->authService->logUserIn($_POST['username']);
                redirect('home');
            }
        } else {
            view('home.register');
        }
    }

    public function logout() 
    {
        $this->authService->logUserOut();
        redirect('login');
    }

    private function redirectToHomeIfAuthorised() {
        if ($this->authService->isLoggedIn()) {
            redirect('home');
        }
    }

    private function redirectToLoginIfNotAuthorised() {
        if (!$this->authService->isLoggedIn()) {
            redirect('login');
        }
    }
}