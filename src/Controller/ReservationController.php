<?php

namespace App\Controller;

use App\Repository\CourtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    private CourtRepository $courtRepository;

    public function __construct(CourtRepository $courtRepository)
    {
        $this->courtRepository = $courtRepository;
    }

    #[Route('/reservation', name: 'app_reservation')]
    public function index(): Response
    {
        $courts = $this->courtRepository->findAll();

        return $this->render('reservation/index.html.twig', [
            'courts' => $courts
        ]);
    }
}
