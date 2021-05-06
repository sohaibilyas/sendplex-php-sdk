<?php

namespace SohaibIlyas\SendPlexPhpSdk\Tests;

use PHPUnit\Framework\TestCase;
use SohaibIlyas\SendPlexPhpSdk\SendPlex;

class SendPlexTest extends TestCase
{
    private $sendplex;
    private $accessToken;

    protected function setUp(): void
    {
        $this->sendplex = new SendPlex();
    }

    /** @test */
    public function it_returns_true_on_valid_login_otherwise_false()
    {
        $auth = $this->sendplex->auth('wrong@email.com', 'wrongPassword123');

        if ($auth) {
            $this->assertTrue($auth);
        }

        $this->assertFalse($auth);
    }

    /** @test */
    public function it_sets_access_token_and_retrieves_it()
    {
        $this->sendplex->setAccessToken('user-access-token');

        $this->assertStringContainsString('user-access-token', $this->sendplex->getAccessToken());
    }
}
