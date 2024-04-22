<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    // ——————————————————————————————————————————————————————————————————————
    // Application
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/app', name: 'app_start', methods: ['GET'], locale: 'en')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig');
    }
}
