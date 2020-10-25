<?php

namespace App\Controller\Medias;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MediasController
 * @package App\Controller\Medias
 * @Route("/")
 */
class MediasController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
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

    /**
     * @Route("/media/{id}", name="media")
     * @param int $id
     * @param MediaRepository $repo
     * @return Response
     */
    public function getOne(int $id, MediaRepository $repo)
    {
        return $this->render('medias/media.html.twig', [
            'media' => $repo->find($id)
        ]);
    }
}
