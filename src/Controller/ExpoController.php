<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\EXPOSITION;
use App\Entity\oeuvre_EXPOSEE;

class ExpoController extends AbstractController
{
    /**
     * @Route("/expo", name="expo")
     */
    public function index(): Response
    {

        $expos = $this->getDoctrine()
                    ->getRepository('App\Entity\EXPOSITION')
                    ->findAll();

        return $this->render('expo/index.html.twig', [
            'controller_name' => 'ExpoController', 'expos' => $expos
        ]);
    }
    
    /**
    * @Route("/voirexpo", name="voirexpo")
    */
    public function voirExpo(Request $rq)
    {
        if($rq->isMethod('POST')){
            $idExpo = $rq->request->get('idexpo');
            $expo = $this->getDoctrine()
                        ->getRepository('App\Entity\EXPOSITION')
                        ->find($idExpo);

            $dansexpo = $this->getDoctrine()
                            ->getRepository('App\Entity\oeuvre_EXPOSEE')
                            ->getOeuvreExpo($idExpo);
        } 

        return $this->render('expo/voirExp.html.twig',['controller_name' => 'ExpoController', 'expo' => $expo, 'photoexpo' => $dansexpo]);
    }
}
