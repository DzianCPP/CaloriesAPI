<?php

declare(strict_types=1);

namespace App\Service\Guest\Signup;

use App\Service\Guest\Signup\Dto\UserDto;

interface SignupInterface
{
    public function signup(): UserDto|false;
}
