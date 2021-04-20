<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    /**
     * @Route("/", name="Album")
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        $listAlbum = $albumRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            "listAlbum" => $listAlbum
        ]);
    }

    /**
     * @Route("/add", name="adicionar")
     */
    public function adicionar(Request $request, AlbumRepository $albumRepository){
        $name = $request->get('name');
        $band = $request->get('band');
        $imgUrl = $request->get('imgUrl');
        $qtdMusics = $request->get('qtdMusics');
        $playTime = $request->get('playTime');
        $album = new Album($band, $name, $imgUrl,$qtdMusics, $playTime);

        $albumRepository->save($album);

        $this->addFlash("message", "a new album has been delivered to my collection");

        return $this->redirectToRoute("Album");
    }

}
