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

        $password = "";
        for ($i = 0; $i < 15; $i += 1) {
            $randstring .= $characters[rand(0, strlen($chars))];
        }

        $stupid = Password::isStupid($password);
        $this->assertFalse($stupid, "random password is (probably) not stupid");
    }

    public function testFirstPassword()
    {
        $stupid = Password::isStupid("123456");
        $this->assertTrue($stupid, "123456 is a stupid password");
    }

    public function testLastPassword()
    {
        $stupid = Password::isStupid("brady");
        $this->assertTrue($stupid, "brady is a stupid password");
    }
}
