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
        
        $article = $repository->findAll();
        dump($article);
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'articles' => $article,
        ]);
    }
    /**
     * @Route("/{title}",name="article")
     */

    public function article($title){
        return $this->render('post/article.html.twig', [
            'Article'=> $this->getDoctrine()->getRepository(Blog::class)->findOneBy(['title'=>$title]),
        ]);
    }
}
