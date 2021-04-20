<?php

namespace App\Controller;

use App\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    /**
     * @Route("/", name="Album")
     */
    public function index(): Response
    {
        $sabbath = new Album("Black sabbath","Black sabbath", "https://2.bp.blogspot.com/-PnW1RODaxoY/UeFsE-z-aJI/AAAAAAAAT6g/xOic4T785Gc/s1600/Black-Sabbath-album-cover.jpg", 10, 50);
        $cowboys = new Album("Pantera","CowBoys From Hell", "https://img.discogs.com/L1lhVb3qk5QHpJLBoYmgUWc0_VU=/fit-in/600x515/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-2534882-1350747897-4609.jpeg.jpg", 12, 90);
        $listaAlbum = [$sabbath, $cowboys];

        return $this->render('home/index.html.twig', [
            "listaAlbum" => $listaAlbum
        ]);
    }
}
