<?php

namespace App\Controller;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->findAll();
        usort($article, array($this,"orderByDate"));
        dump($article);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $article,
        ]);
    }
    public function orderByDate($a,$b){
        if($a->date == $b->date){
            return 0;
        } else if ($a -> date < $b -> date){
            return -1;
        }else {
            return 1;
        }
    }
}
