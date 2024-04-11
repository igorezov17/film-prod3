<?php

namespace Kernel\Auth;

use Kernel\ConfigData\ConfigDataInterface;
use Kernel\Database\DatabaseInterface;
use Kernel\Session\SessionInterface;


class Auth extends AuthInterface
{

    private SessionInterface $session;

    private DatabaseInterface $db;

    private ConfigDataInterface $config;

    public function __construct(SessionInterface $session, DatabaseInterface $db, ConfigDataInterface $config)
    {
        $this->session  = $session;
        $this->db       = $db;
        $this->config   = $config;

    }

    public function attemt(string $username, string $password): bool
    {

        $user = $this->db->first('users', [
            'email' => $username
        ]);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        // $this->session->set();


        return true;
    }

    public function logout(): void
    {

    }

    public function check(): bool
    {
        return true;
    }

    public function user(string $username): ?array
    {
        return [] ?? null;
    }

    public function table(): string 
    {
        return $this->config->get('auth.table', 'users');
    }

    public function username(): string
    {
        return $this->config->get('auth.username', 'email');
    }

    public function password(): string
    {
        return $this->config->get('auth.password', 'password');
    }
}