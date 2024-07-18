<?php
namespace App\Controller\admin;

use App\Entity\Candy;
use App\Repository\CandyRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class ArticleController extends AbstractController
{
    #[Route('/articles', name:'articles_index')]
    public function index ()
    {
        return $this->render('articles/index.html.twig');
    }

    #[Route('/articles/create', name:'articles_create')]
    public function createArticles (EntityManagerInterface $em)
    {
        $candy = new Candy();
        $candy->setEmail('hello@world.com')
        ->setName('Bigou')
        ->setPassword('bratza')
        ->setSlug('helloworld');

        $em->persist($candy);
        $em->flush();

        return $this->render('articles/articles_create.html.twig');
    }

    #[Route('/update/{id}', name:'articles_update',requirements:['id'=>Requirement::DIGITS])]
    public function updateArticles ($id,CandyRepository $repository,EntityManagerInterface $em)
    {
        $candy = $repository->find($id);
        $candy->setEmail('ablogang@gmail.com');
        $em->flush();
       return $this->render('articles/update_articles.html.twig');
    }

    #[Route('/delete/{id}', name:'articles_delete',requirements:['id'=>Requirement::DIGITS] )]
    public function deleteArticles ($id , CandyRepository $repository , EntityManagerInterface $em)
    {
        $candy = $repository->find($id);
        $em->remove($candy);
        $em->flush();
        return $this->render('articles/delete_articles.html.twig');
    }
}