<?php

declare(strict_types=1);

namespace App\Service\Guest;

use App\Service\Guest\Signup\Dto\SignUpDto;
use App\Service\Guest\Signup\Dto\UserDto;
use App\Service\Guest\Signup\SignupInterface;

class Signup implements SignupInterface
{
    private SignUpDto $signUpDto;

    public function __construct(array $signUpFormData)
    {
        $this->signUpDto = new SignUpDto($signUpFormData);
    }

    public function signup(): UserDto|false
    {
        if ($this->signUpDto->get('username')) {
            return new UserDto();
        }
        
        return false;
    }
}
