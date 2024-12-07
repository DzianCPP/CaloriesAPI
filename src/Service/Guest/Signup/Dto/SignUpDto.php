<?php

declare(strict_types=1);

namespace App\Service\Guest\Signup\Dto;

use Exception;

class SignUpDto
{
    private array $options = [
        'username' => '',
        'gender' => '',
    ];

    public function __construct(array $signUpFormData)
    {
        $this->username = $signUpFormData['username'];
        $this->gender = $signUpFormData['gender'];
    }

    private function resolveByParams(array $params): static
    {
        foreach ($params as $key => $value) {
            $this->options[$key] = $value;
        }

        return $this;
    }

    public function get(string $param): mixed
    {
        if (!array_key_exists($param, $this->options)) {
            throw new Exception('Such param is not present in the ' . self::class);
        }

        return $this->options[$param];
    }
}
