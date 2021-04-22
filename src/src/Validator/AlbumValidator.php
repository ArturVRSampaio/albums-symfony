<?php

namespace App\Validator;

use Exception;
use Symfony\Component\HttpFoundation\Request;

class AlbumValidator{

    public function validateImput(Request $request)
    {
        $name = $request->get('name');
        $band = $request->get('band');
        $imgUrl = $request->get('imgUrl');
        $qtdMusics = $request->get('qtdMusics');
        $playTime = $request->get('playTime');

        if(strlen($name)<2){
            throw new Exception("nome nao pode estar em branco");
        }
        if(strlen($band)<2){
            throw new Exception("nome da banda nao pode estar em branco");
        }
        if(strlen($imgUrl)<2){
            throw new Exception("imagem nao pode estar em branco");
        }
        if(!is_int($qtdMusics) ||  $qtdMusics>1){
            throw new Exception("quantidade de musicas nao pode estar em branco");
        }
        if(!is_int($playTime)  ||  $playTime>1){
            throw new Exception("o tempo total ao pode ser nulo");
        }

    }

}