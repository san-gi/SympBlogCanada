<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PhotosController extends AbstractController
{
   
    /**
     * @Route("/Photos", name="photos")
     */
    public function index2()
    {
        $ptab = [];
        $plist = glob('photos/*');
        foreach($plist as $filename){
  
            $ptab[$filename] = glob($filename.'/*');
            
        }
        return $this->render('photos/index.html.twig', [
            'controller_name' => 'PhotosController',
            'plist' =>$ptab,
        ]);

    }
}
