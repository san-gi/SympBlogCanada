<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormTestController extends AbstractController
{
    /**
     * @Route("/form", name="form_test")
     */
    public function index(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $a = $repository->findAll();
        $articles = new Article();
        $form = $this->createForm(ArticleType::class, $articles);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $ar = new Article();
            $ar->setTitre($articles->getTitre());
            $ar->setCorp($articles->getCorp());
            $ar->setImg($articles->getImg());
            $ar->setDate($articles->getDate());
            $ar->setTxtphoto($articles->getTxtphoto());
            $em = $this->getDoctrine()->getManager();
            $em->persist($ar);
            $em->flush();
            
        }
        return $this->render('form_test/index.html.twig', [
            'controller_name' => 'FormTestController',
            'form' => $form->createView(),
            'articles' => $a,
        ]);
    }
}
