<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Menu;
use App\Entity\Plat;
use App\Repository\MenuRepository;
use App\Repository\PlatRepository;

use PhpParser\Node\Expr\Cast\String_;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\ExpressionLanguage\Node\GetAttrNode;

/**
 * @Route("/restaurant")
 */
class RestaurantController extends AbstractController
{
    /**
     * @Route("/", name="restaurant_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $restaurants = $entityManager
            ->getRepository(Restaurant::class)
            ->findAll();

        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }


 /**
 * @Route("/menuresto/{id}", name="restaurantMenu_show", methods={"GET"})
 */
    public function showmenu(Restaurant $restaurant,EntityManagerInterface $entityManager,platRepository $rep): Response
    {
        $id =$restaurant->getId();
        $plat = $rep->listplatByResto($id);
        dd($plat);
        return $this->render('restaurant/consulterResto.html.twig', [
            'restaurant' => $restaurant,
        ]);
    
    }







    /**
     * @Route("/new", name="restaurant_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,MenuRepository $repMenu): Response
    {
        $restaurant = new Restaurant();
        $menu=new menu();

        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $titre=$restaurant->getNom();
        
            $MenuController=new MenuController;
           $MenuController->newmenu($titre,$entityManager);
           dump($titre);

 
           $menu=$repMenu->findOneBy(array ('titre'=>$titre));
           $id=$menu->getId();
           $restaurant->setMenuid($menu);
            $entityManager->persist($restaurant);
            $entityManager->flush();

            return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('restaurant/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restaurant_show", methods={"GET"})
     */
    public function show(Restaurant $restaurant): Response
    {
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="restaurant_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Restaurant $restaurant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('restaurant/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restaurant_delete", methods={"POST"})
     */
    public function delete(Request $request, Restaurant $restaurant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurant->getId(), $request->request->get('_token'))) {
            $entityManager->remove($restaurant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
    }
}
