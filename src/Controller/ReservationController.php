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
const DATEFORMAT_DB = 'Y-m-d H:i';
const DATEFORMAT_FRONTEND = 'd.m.Y H:i';

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

        dd($reservations = $this->reservationRepository->findAll());
        die();

        //ToDo:
        // aktuelles Datum einschränken
//        for ($time = $begin; $time <= $end; $time->modify('+1 hour')) {
//            $date = $time->format(DATEFORMAT_DB);
////            var_dump($reservations->findByDate($date));
////            die();
//        }
        // repository fktn für ein Datum alle Einträge ausgeben



        return $this->render('reservation/index.html.twig', [
            'courts' => $courts,
            'reservations' => $reservations,
            'start_date' => $begin,
            'num_hours' => ceil(($end->format('U') - $begin->format('U')) / 3600)
        ]);
    }
}
