<?php

namespace App\Controller;

use App\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $sabbath = new Album("Black sabbath","Black sabbath", 10, 50);
        $cowboys = new Album("Pantera","CowBoys From Hell", 12, 90);
        $listaAlbum = [$sabbath, $cowboys];

        return $this->render('home/index.html.twig', [
            "listaAlbum" => $listaAlbum
        ]);
    }
}
