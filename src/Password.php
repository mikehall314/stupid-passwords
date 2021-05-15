<?php

namespace Stupid;

/**
 * Password
 * Checks if a password appears in the top 10,000 most used passwords
 *
 * @author Mike Hall
 * @license MIT
 */
class Password
{
    public static function isStupid(string $password): bool
    {
        // Only load this if we need to
        static $data;
        if (empty($data)) {
            $data = file_get_contents(__DIR__ . "/passwords.dict");
        }

        return strpos($data, sha1($password)) !== false;
    }
}
