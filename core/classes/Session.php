<?php

namespace Core;

use App\App;

/**
 * Klase valdanti loginus
 *
 * Class Session
 * @package Core
 */
class Session
{
    private $user;

    public function __construct()
    {
        $this->loginFromCookie();
    }

    /**
     * Login user from server side cookie
     *
     * @return bool
     */
    public function loginFromCookie(): bool
    {
        if (!empty($_SESSION)) {
            if ($this->login($_SESSION['email'], $_SESSION['password'])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Login user, if user exists in db
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        $users = App::$db->getRowsWhere('users', ['email' => $email, 'password' => $password]);
        if ($users) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $this->user = reset($users);
            return true;
        }

        return false;
    }

    /**
     * Get user if logged in
     *
     * @return null|array
     */
    public function getUser(): ?array
    {
        return $this->user;
    }

    /**
     * Logout user from the website
     *
     * @param null $redirect
     * @return void
     */
    public function logout($redirect = null): void
    {
        $_SESSION = [];
        setcookie('PHPSESSID', null, -1);
        session_destroy();

        if ($redirect) {
            header("Location: $redirect");
            exit;
        }
    }
}