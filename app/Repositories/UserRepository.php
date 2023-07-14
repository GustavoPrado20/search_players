<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository
{
    protected static $model = User::class;

    public static function findByEmail(string $email){
        return self::loadModel()::query()->where( ['email' => $email])->first();  
    }

    public static function formatLink(string $link){
        $dados_link = ltrim($link, 'https://');
        $site =('https://'.$dados_link);

        return $site;
    }

    public static function pixelsFoto($foto)
    {
        if(!empty($foto->getClientOriginalName()))
        {
            $largura=1500;
            $altura=1500;
            $tamanho=2018000;

            $dimensoes = getimagesize($foto->getPathName());

            if($dimensoes[0] > $largura and $dimensoes[1] > $altura)
            {
                return '<script>window.alert("A largura e a altura da imagem não pode ultrapassar '.$largura.' pixels!"); window.location="/configuração/perfil"; </script>';
            }
            
            if($foto->getSize() > $tamanho)
            {
                return '<script>window.alert("O tamanho da imagem não pode ultrapassar '.$tamanho.' bites!"); window.location="/configuração/perfil"; </script>';
            }

            preg_match("/\.(jpg|jpeg|gif|bmp|png|webp|svg){1}$/i", $foto->getClientOriginalName(), $ext);
            $nome_foto = md5(uniqid()).'.'.$ext[1];

            $caminho_imagem= public_path('img/foto_perfis/');

            $foto->move($caminho_imagem, $nome_foto);

            return $nome_foto;
        }
    }

    public static function pixelsBanner($banner)
    {
        if(!empty($banner->getClientOriginalName()))
        {
            $largura=200000;
            $altura=1500;
            $tamanho=2018000;

            $dimensoes = getimagesize($banner->getPathName());

            if($dimensoes[0] > $largura and $dimensoes[1] > $altura)
            {
                return '<script>window.alert("A largura e a altura da imagem não pode ultrapassar '.$largura.' pixels!"); window.location="/configuração/perfil"; </script>';
            }
            
            if($banner->getSize() > $tamanho)
            {
                return '<script>window.alert("O tamanho da imagem não pode ultrapassar '.$tamanho.' bites!"); window.location="/configuração/perfil"; </script>';
            }

            preg_match("/\.(jpg|jpeg|gif|bmp|png|webp|svg){1}$/i", $banner->getClientOriginalName(), $ext);
            $nome_banner = md5(uniqid()).'.'.$ext[1];

            $caminho_imagem= public_path('img/banners_perfis/');

            $banner->move($caminho_imagem, $nome_banner);

            return $nome_banner;
        }
    }

}