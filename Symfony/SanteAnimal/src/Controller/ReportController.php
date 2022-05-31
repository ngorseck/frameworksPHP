<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/report/generate/excel", name="generateExcel")
     */
    public function generateExcel()
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }
    /**
     * @Route("/report/read/excel", name="readExcel")
     */
    public function readExcel()
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }
    /**
     * @Route("/report/pdf", name="generatePdf")
     */
    public function generatePdf()
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }
    /**
     * @Route("/report/uplaod", name="doUpload")
     */
    public function doUpload()
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }
}
