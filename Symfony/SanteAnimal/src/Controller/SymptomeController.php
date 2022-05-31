<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SymptomeController extends AbstractController
{
    /**
     * @Route("/symptome", name="symptome")
     */
    public function index()
    {
        return $this->render('symptome/index.html.twig', [
            'controller_name' => 'SymptomeController',
        ]);
    }
}
