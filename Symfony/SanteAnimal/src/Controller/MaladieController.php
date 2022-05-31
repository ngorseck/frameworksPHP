<?php

namespace App\Controller;

use App\Entity\Maladie;
use App\Form\MaladieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MaladieController extends AbstractController
{
    /**
     * @Route("/maladie", name="maladie")
     */
    public function index()
    {
        return $this->render('maladie/index.html.twig', [
            'controller_name' => 'MaladieController',
        ]);
    }
    /**
     * @Route("/maladie/add", name="addMaladie")
     */
    public function add()
    {
        return $this->render('maladie/index.html.twig', [
            'controller_name' => 'MaladieController',
        ]);
    }
    /**
     * @Route("/maladie/persist", name="persistMaladie")
     */
    public function persist(Request $request)
    {
        $maladie = new Maladie();
        $form = $this->createForm(MaladieType::class, $maladie);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($maladie);
                $em->flush();
                $maladie = new Maladie();
                $form = $this->createForm(MaladieType::class, $maladie);
            }
        }
        return $this->render('maladie/persist.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/maladie/list", name="listMaladie")
     */
    public function list()
    {
        return $this->render('maladie/index.html.twig', [
            'controller_name' => 'MaladieController',
        ]);
    }
}
