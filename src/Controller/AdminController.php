<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        
        $bd = $repository->findAll();

        return $this->render('admin/index.html.twig', [
            'bd' => $bd,
        ]);
    }
}
