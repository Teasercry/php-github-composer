<?php

require './vendor/autoload.php';

use App\Api\GitHub;

$apiGitHub = new GitHub('https://api.github.com');

$apiGitHub->getUsers(50);
