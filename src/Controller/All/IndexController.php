<?php

declare(strict_types=1);

namespace App\Controller\All;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    #[Route(path: '/', methods: ['GET', 'POST'])]
    public function index(): JsonResponse
    {
        return new JsonResponse(
            [
                'statusCode' => Response::HTTP_PERMANENTLY_REDIRECT,
                'message' => 'Follow the link',
                'uri' => $this->generateUrl('signup'),
            ]
        );
    }
}
