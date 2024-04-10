<?php

namespace Kernel\Database;

interface DatabaseInterface
{
    public function insert(string $table, array $data): int|false;
}