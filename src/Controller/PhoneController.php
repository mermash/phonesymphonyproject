<?php

namespace App\Controller;

use App\DTO\Request\AddPhoneNumberRequest;
use App\Service\PhoneService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhoneController extends AbstractController
{
    public function __construct(private PhoneService $phoneService)
    {
    }

    #[Route('/api/v1/phone', methods: ['POST'])]
    public function createPhone(#[RequestBody] AddPhoneNumberRequest $request): Response
    {
        $this->phoneService->addPhoneNumber($request);
        return $this->json(null);
    }
}
