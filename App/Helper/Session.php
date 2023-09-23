<?php

namespace App\Helper;

class Session
{
    private static $instances = [];
    private $signedIn = false;
    public $userId;
    public $message;

    protected function __construct()
    {
        session_start();
        $this->checkLogin();
        $this->checkMessage();
    }

    protected function __clone()
    {
    }

    public static function getInstance(): Session
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function setRole($role)
    {
        $_SESSION['role'] = $role;
    }

    public function getRole()
    {
        if (isset($_SESSION['role'])) {
            return $_SESSION['role'];
        } else {
            return null; // or any default role you want
        }
    }

    public function isSignedIn()
    {
        return $this->signedIn;
    }

    public function checkLogin()
    {
        if (isset($_SESSION['userId'])) {
            $this->userId = $_SESSION['userId'];
            $this->signedIn = true;
        } else {
            unset($this->userId);
            $this->signedIn = false;
        }
    }

    public function login($user)
    {
        if ($user) {
            $this->userId = $user->id;
            $_SESSION['userId'] = $user->id;
            $_SESSION['role'] = $user->role;
            $this->signedIn = true;
        }
    }

    public function logout()
    {
        unset($_SESSION['userId']);
        unset($this->userId);
        $this->signedIn = false;
    }

    public function message($msg = "")
    {
        if (!empty($msg)) {
            $this->message = $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    public function checkMessage()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}
