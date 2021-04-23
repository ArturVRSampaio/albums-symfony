<?php

namespace App\Controller;

use App\Entity\Album;
use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    /**
     * @Route("/", name="album")
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        $listAlbum = $albumRepository->findAll();
        $form = $this->createForm(AlbumType::class);

        return $this->render('album/albumdb.html.twig', [
            "listAlbum" => $listAlbum,
            "formAlbum" => $form->createView()
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request, AlbumRepository $albumRepository){

        $form = $this->createForm(AlbumType::class);
        $form->handleRequest($request);

        if($form->isValid()) {
            $album = $form->getData();

            $albumRepository->save($album);
            $this->addFlash("message", "a new album has been delivered to my collection");
        
        }else {
            $listAlbum = $albumRepository->findAll();
            return $this->render('album/albumdb.html.twig', [
                "listAlbum" => $listAlbum,
                "formAlbum" => $form->createView()
            ]);
        }
        return $this->redirectToRoute("album");
        
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Album $album): Response
    {
        $form = $this->createForm(AlbumType::class);
        return $this->render('album/editAlbum.html.twig', [
            "album" => $album,
            "formAlbum" => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/save/{id}", name="edit_save")
     */
    public function saveEdit(Request $request, Album $album, AlbumRepository $albumRepository): Response
    {
        $form = $this->createForm(AlbumType::class);
        $form->handleRequest($request);

        if($form->isValid()) {
            $album = $form->getData();

            $name = $request->get('name');
            $band = $request->get('band');
            $imgUrl = $request->get('imgUrl');
            $qtdMusics = $request->get('qtdMusics');
            $playTime = $request->get('playTime');

            $album->setname($name);
            $album->setband($band);
            $album->setimgUrl($imgUrl);
            $album->setqtdMusics($qtdMusics);
            $album->setplayTime($playTime);

            $albumRepository->save($album);

            $this->addFlash("message", "Edit save with success");
        
        }else {
            $listAlbum = $albumRepository->findAll();
            return $this->render('album/editAlbum.html.twig', [
                "listAlbum" => $listAlbum,
                "formAlbum" => $form->createView()
            ]);
        }
        return $this->redirectToRoute("album");

    }

    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove(Album $album, AlbumRepository $albumRepository): Response
    {
        $albumRepository->remove($album);
        $this->addFlash("message", "Album removed with success");

        return $this->redirectToRoute("home");
    }

}
