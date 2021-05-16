<?php

declare(strict_types=1);

namespace StupidTest;

use PHPUnit\Framework\TestCase;
use Stupid\Password;

final class StupidPasswordTest extends TestCase
{
    public function testCommonPassword()
    {
        $stupid = Password::isStupid("password1");
        $this->assertTrue($stupid, "password1 is a stupid password");
    }

    public function testUncommonPassword()
    {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        // Generate a random password which shouldn't (but, of course, may...)
        // appear in the password list
        $password = "";
        while (strlen($password) < 15) {
            $index = rand(0, strlen($chars));
            $password .= $chars[$index];
        }

        $stupid = Password::isStupid($password);
        $this->assertFalse($stupid, "random password is (probably) not stupid");
    }

    public function testFirstPassword()
    {
        // Hashes to 00026b8... first in the dict
        $stupid = Password::isStupid("??????");
        $this->assertTrue($stupid, "?????? is a stupid password");
    }

    public function testLastPassword()
    {
        // Hashes to ffff80d... last in the dict
        $stupid = Password::isStupid("mirror");
        $this->assertTrue($stupid, "mirror is a stupid password");
    }
}
