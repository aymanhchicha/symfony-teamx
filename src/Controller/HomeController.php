<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Restaurant;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {

        $restaurants = $entityManager
        ->getRepository(Restaurant::class)
        ->findAll();
        
        return $this->render('restaurant/ListeResto.html.twig', [
            'controller_name' => 'HomeController','restaurants' => $restaurants
        ]);
    }
}
