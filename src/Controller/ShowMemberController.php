<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMemberController extends AbstractController
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $user = $this->userRepository->findAll();
        return $this->render('showMember/index.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/memberList', name: 'app_show_member')]
    public function show(): Response
    {
        $user = $this->userRepository->findAll();
        return $this->render('showMember/index.html.twig', [
            'user' => $user,
        ]);
    }
}
