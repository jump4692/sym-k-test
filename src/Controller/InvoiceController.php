<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceLines;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\InvoiceType;
use Doctrine\Persistence\ManagerRegistry;

class InvoiceController extends AbstractController
{
     public function new(Request $request, ManagerRegistry $doctrine): Response
    {
	    $invoice = new Invoice();        
        
		$form = $this->createForm(InvoiceType::class, $invoice);
		
		$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $invoice = $form->getData();
            
			$entityManager = $doctrine->getManager();
			$entityManager->persist($invoice);
       		$entityManager->flush();
       		
            return $this->redirectToRoute('new_invoice');
        }
        
		return $this->renderForm('form.html.twig', [
            'form' => $form,
        ]);

    }
    
    public function list(ManagerRegistry $doctrine): Response
    {
        $invoice = $doctrine->getRepository(Invoice::class)->findAll();

        if (!$invoice) {
            throw $this->createNotFoundException(
                'Nothing here'
            );
        }

        return $this->render('list.html.twig', ['Invoice' => $invoice]);

    }
}
