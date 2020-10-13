<?php

namespace App\Controller\Medias;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MediasController
 * @package App\Controller\Medias
 * @Route("/medias")
 */
class MediasController extends AbstractController
{
    /**
     * @Route("/", name="medias")
     * @param MediaRepository $repo
     * @return Response
     */
    public function index(MediaRepository $repo)
    {
        return $this->render('medias/index.html.twig', [
            'books' => $repo->findAllBooks(),
            'movies' => $repo->findAllMovies(),
            'series' => $repo->findAllSeries(),
            'albums' => $repo->findAllAlbums(),
        ]);
    }
}
