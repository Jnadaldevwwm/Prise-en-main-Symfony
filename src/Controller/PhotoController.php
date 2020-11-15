<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
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
            ->findAll();

        return $this->render('photo/index.html.twig', [
            'controller_name' => 'PhotoController', 'photos' => $photos
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $requete, EntityManagerInterface $em): Response{
        $form = $this->createFormBuilder()
                ->add('titre', TextType::class)
                ->add('annee', IntegerType::class)
                ->add('prix', NumberType::class)
                ->add('visuel', TextType::class)
                ->add('submit', SubmitType::class, ['label' => 'Ajout Photo'])
                ->getForm();

        $form->handleRequest($requete);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $photo = new Photo;
            $photo->setTitre($data['titre']);
            $photo->setAnnee($data['annee']);
            $photo->setPrix($data['prix']);
            $photo->setVisuel($data['visuel']);
            $em->persist($photo);
            $em->flush();

            return $this->redirectToRoute('photo');
        }

        return $this->render('photo/create.html.twig', [
                    'controller_name' => 'PhotoController', 'formulaire' => $form->createView()
                ]);
       
    }
}
