<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    /**
     * @Route("/pays", name="pays")
     */
    public function index()
    {
        $pays = new Pays();
        $pays->setNom("Senegal");

        $em = $this->getDoctrine()->getManager();
        $listpays = $em->getRepository('App\Entity\Pays')->findAll();
        //$em->flush();
        return $this->render('pays/index.html.twig', ['listepays' => $listpays]);
    }

    /**
     * @Route("/pays/persist", name="persistPays")
     */
    public function persist(Request $request)
    {
        $pays = new Pays();
        $form = $this->createForm(PaysType::class, $pays);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($pays);
                $em->flush();
            }
        }
        return $this->render('pays/persist.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/pays/add", name="addPays")
     */
    public function add()
    {
        if (isset($_POST['envoyer']))
        {
            $pays = new Pays();
            $pays->setNom($_POST['nom']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($pays);
            $em->flush();
        }
        return $this->render('pays/add.html.twig');
    }
    /**
     * @Route("/pays/update", name="updatePays")
     */
    public function update()
    {
        if (isset($_POST['envoyer']))
        {
            $em = $this->getDoctrine()->getManager();
            $pays = $em->getRepository('App\Entity\Pays')->find($_POST['id']);

            $pays->setNom($_POST['nom']);

            $em->merge($pays);
            $em->flush();
        }
        return $this->redirectToRoute('listPays');
    }
    /**
     * @Route("/pays/list", name="listPays")
     */
    public function list()
    {
        $pays = new Pays();
        $pays->setNom("Senegal");

        $em = $this->getDoctrine()->getManager();
        $listpays = $em->getRepository('App\Entity\Pays')->findAll();
        //$em->flush();
        return $this->render('pays/index.html.twig', ['listepays' => $listpays]);
    }
    /**
     * @Route("/pays/edit/{id}", name="editPays")
     */
    public function edit($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pays = $em->getRepository('App\Entity\Pays')->find($id);
        //$form = $this->createForm(PaysType::class, $pays);
        //return $this->render('pays/persist.html.twig', ['form' => $form->createView()]);
        return $this->render('pays/edit.html.twig', ['pays' => $pays]);
    }
    /**
     * @Route("/pays/delete/{id}", name="deletePays")
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pays = $em->getRepository('App\Entity\Pays')->find($id);
        $em->remove($pays);
        $em->flush();
        return $this->redirectToRoute('listPays');
    }
    /**
     * @Route("/pays/get/{id}", name="getPays", methods="GET")
     */
    public function get($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pays = $em->getRepository('App\Entity\Pays')->find($id);

        return new JsonResponse($pays, 200);
    }

}
