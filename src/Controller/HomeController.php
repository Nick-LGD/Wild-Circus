<?php

namespace App\Controller;

use App\Entity\Planing;
use App\Repository\PlaningRepository;
use App\Entity\Performance;
use App\Repository\PerformanceRepository;
use App\Repository\PriceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param PerformanceRepository $performanceRepository
     * @param PlaningRepository $planningRepository
     * @return Response
     */
    public function index(PerformanceRepository $performanceRepository, PlaningRepository $planningRepository): Response
    {
        $performances = $performanceRepository->findBy([], ['title' => 'ASC'], 3);
        return $this->render('home/index.html.twig', [
            'performances' => $performances,
        ]);
    }

    /**
     * @Route("/date", name="wild_circus_date")
     * @param PlaningRepository $planingRepository
     * @return Response
     */
    public function date(PlaningRepository $planingRepository): Response
    {
        $dates = $planingRepository->findby([], ['infodate' => 'ASC']);
        return $this->render('home/date.html.twig', [
            'dates' => $dates,
        ]);
    }


    /**
     * @Route("/performance", name="wild_circus_performance")
     * @param PerformanceRepository $performanceRepository
     * @return Response
     */
    public function performance (PerformanceRepository $performanceRepository): Response
    {
        $performances = $performanceRepository->findAll();
        return $this->render('home/performance.html.twig', [
            'performances' => $performances,
        ]);
    }

    /**
     * @Route("/tarif", name="wild_circus_tarif")
     * @param PriceRepository $priceRepository
     * @return Response
     */
    public function price (PriceRepository $priceRepository) :Response
    {
        $tarifs = $priceRepository->findAll();
        return $this->render('home/price.html.twig', [
            'tarifs' => $tarifs,
        ]);
    }


}