<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Photo;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    
    public function index(): Response
    {
        $photos = $this->getDoctrine()
            ->getRepository('App\Entity\Photo')
            ->get3photos();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController', 'photos' => $photos
        ]);
    }
}
