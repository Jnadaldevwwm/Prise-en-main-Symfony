<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Photo;

class PhotoController extends AbstractController
{
    /**
     * @Route("/photo", name="photo")
     */
    public function index(): Response
    {
        $photos = $this->getDoctrine()
            ->getRepository('App\Entity\Photo')
            ->get3photos();

        return $this->render('photo/index.html.twig', [
            'controller_name' => 'PhotoController', 'photos' => $photos
        ]);
    }
}
