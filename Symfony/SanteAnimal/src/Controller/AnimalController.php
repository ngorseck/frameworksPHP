<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/animal", name="animal")
     */
    public function index()
    {
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
        ]);
    }

    /**
     * @Route("/animal/persist", name="persistAnimal")
     */
    public function persist(Request $request)
    {
        /*$animal = new Animal();
        $animal->setNom("Cheval");
        $animal->setCategorie("Herbivor");
        $em = $this->getDoctrine()->getManager();
        //$em->persist($animal);
        //$em->flush();
        $animal = $this->getDoctrine()->getManager()->getRepository("App\Entity\Animal")->find(1);

        $animal->addPays($this->getDoctrine()->getManager()->getRepository("App\Entity\Pays")->find(1));
        $animal->addPays($this->getDoctrine()->getManager()->getRepository("App\Entity\Pays")->find(2));
        $animal->addPays($this->getDoctrine()->getManager()->getRepository("App\Entity\Pays")->find(3));

        $em->merge($animal);
        $em->flush();*/
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($animal);
                $em->flush();
            }
        }
        return $this->render('animal/persist.html.twig', ['form' => $form->createView()]);
    }
}
