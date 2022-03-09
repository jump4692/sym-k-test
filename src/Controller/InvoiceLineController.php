<?php

namespace App\Controller;

use App\Entity\InvoiceLine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\InvoiceLineType;
use Doctrine\Persistence\ManagerRegistry;

class InvoiceLineController extends AbstractController
{
    #[Route('/invoice/line', name: 'app_invoice_line')]
    public function index(): Response
    {
        return $this->render('invoice_line/index.html.twig', [
            'controller_name' => 'InvoiceLineController',
        ]);
    }
}
