<?php

namespace App\Controller;

use App\Entity\Album;
use App\Validator\AlbumValidator;
use App\Repository\AlbumRepository;
use Exception;
use PhpParser\Node\Expr\Cast\Bool_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{

    private AlbumValidator $validador;
    public function __construct()
    {
        $this->validador = new AlbumValidator();
    }
    /**
     * @Route("/", name="Album")
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        $listAlbum = $albumRepository->findAll();
        
        return $this->render('album/albumdb.html.twig', [
            "listAlbum" => $listAlbum
        ]);
    }

    /**
     * @Route("/add", name="adicionar")
     */
    public function adicionar(Request $request, AlbumRepository $albumRepository){
        try{
        $this->validador->validateImput($request);
        
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
        catch(Exception $e){
            $this->addFlash("message", $e->getMessage());
            return $this->redirectToRoute("Album");
        }
    
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Album $album): Response
    {
        return $this->render('album/editAlbum.html.twig', [
            "album" => $album
        ]);
    }

    /**
     * @Route("/edit/save/{id}", name="edit_save")
     */
    public function saveEdit(Request $request, Album $album, AlbumRepository $albumRepository): Response
    {
        $this->validador->validateImput($request);
            //$this->addFlash("message", "request fail");
            //return $this->redirectToRoute("Album");
        

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

            $this->addFlash("message", "Album added with success");

            return $this->redirectToRoute("home");
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
