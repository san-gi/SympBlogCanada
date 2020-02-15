<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        /* $blog = new Blog();
        $blog->setTitle("mon premier article")
            ->setArticle("Bonjour, ceci est mon premier article, je suis fort content que vous le lisiez !");

        $em = $this->getDoctrine()->getManager();
        $em->persist($blog);
        $em->flush();
        */
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        dump($repository);
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
