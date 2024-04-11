<?php

namespace Kernel\Auth;

interface AuthInterface
{
    public function attemt(string $username, $password): bool;

    public function logout(): void;

    public function check(): bool;

    public function user(): ?array;

    public function table(): string;

    public function username(): string;

    public function password(): string;
}