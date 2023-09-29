<?php

use App\Api\GitHub;
use PHPUnit\Framework\TestCase;

final class GitHubTest extends TestCase {
    public function testGet() {
        $apiGitHub = new GitHub();
        $response = $apiGitHub->get('/users');
        $this->assertSame(200, $response->statusCode);
    }
}
