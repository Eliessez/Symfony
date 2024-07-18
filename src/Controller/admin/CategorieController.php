<?php
namespace App\Controller\admin;

use App\Entity\Categorie;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class CategorieController extends AbstractController
{
    #[Route('/create' , name:'categorie_create')]
    public function create (EntityManagerInterface $em)
    {
        $categorie = new Categorie();
        $categorie->setNom('sucette')
        ->setDescription('batonnet de bonbon')
        ->setCreateAt(DateTimeImmutable())
        ->setUpdateAt(DateTimeImmutable())
        ;

        $em->persist($categorie);
        $em->flush();

        return $this->render('categorie/categorie_create.html.twig');
    }
}