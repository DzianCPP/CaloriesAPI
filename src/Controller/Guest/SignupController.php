<?php

declare(strict_types=1);

namespace App\Controller\Guest;

use App\UseCase\Service\Signup;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignupController extends AbstractController
{
    #[Route(path: '/signup-form', name: 'signup_form', methods: ['GET'])]
    public function signupForm(): JsonResponse
    {
        return new JsonResponse(['data' => 'Hello!']);
    }

    #[Route(path: '/signup', name: 'signup', methods: ['POST'])]
    public function signup(Request $request): JsonResponse
    {
        $signupUseCase = new Signup();

        $guestData = $request->toArray();

        $result = $signupUseCase->signup($guestData);

        $data = [
            'statusCode' => $result ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
            'message' => $result ? 'You can now login' : 'Something went wrong',
            'uri' => $result ? null : $this->generateUrl('signup'),
        ];

        return new JsonResponse($data);
    }
}
