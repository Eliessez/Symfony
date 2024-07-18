<?php
namespace App\Controller\front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/' , name:'home_index')]
    public function index ()
    {
       return $this->render('home/index.html.twig');
    }
}