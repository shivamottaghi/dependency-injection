<?php

namespace App\Controller;

use App\Master;
use App\Transformers\CapitalEveryOther;
use App\Transformers\Logger;
use App\Transformers\SpaceToDash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class DiController extends AbstractController
{
    #[Route('/di', name: 'app_di')]
    public function index(Request $request): Response
    {
        $message = 'test';

        $master = new Master(new CapitalEveryOther() , new SpaceToDash() , new Logger());
        $form = $this->createFormBuilder(['method' => 'post'])
            ->add('message' , TextType::class)
            ->add('submit' , SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($request->isMethod('POST')){
            if ($form->isSubmitted()){
                $data = $form->getData();
                $message = $data['message'];

                $master->echoMessage($message);
                $master->logMessage($message);
            }

        }

        return $this->renderForm('di/index.html.twig', [
            'form' => $form,
            'message'=> $message,
        ]);
    }
}
