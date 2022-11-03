<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMemberController extends AbstractController
{
    #[Route('/showMember', name: 'app_show_member')]
    public function index(): Response
    {
        return $this->render('showMember/index.html.twig', [
            'title' => 'avengers',
        ]);

    }
}
