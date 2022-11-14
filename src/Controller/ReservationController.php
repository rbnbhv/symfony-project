<?php

namespace App\Controller;

use App\Repository\CourtRepository;
use App\Repository\ReservationRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

const TIME_START = '15:00';
const TIME_END = '20:00';

class ReservationController extends AbstractController
{
    private CourtRepository $courtRepository;
    private ReservationRepository $reservationRepository;

    public function __construct(CourtRepository $courtRepository, ReservationRepository $reservationRepository)
    {
        $this->courtRepository = $courtRepository;
        $this->reservationRepository = $reservationRepository;
    }

    #[Route('/reservation', name: 'app_reservation')]
    public function index(): Response
    {
        $courts = $this->courtRepository->findAll();
        $begin = new DateTime('today ' . TIME_START);
        $end = new DateTime('today ' . TIME_END);

        return $this->render('reservation/index.html.twig', [
            'courts' => $courts,
            'start_date' => $begin,
            'num_hours' => ceil(($end->format('U') - $begin->format('U')) / 3600)
        ]);
    }

    public function get(): Response
    {
        $reservations = $this->reservationRepository->findAll();
        return $this->render('reservation/index.html.twig', [
            'reservation' => $reservations
        ]);
    }
}
