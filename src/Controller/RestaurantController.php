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
use App\Repository\MenuPlatRepository;
use App\Repository\MenuRepository;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use App\Services\QrcodeService;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;




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
    public function showmenu(Restaurant $restaurant,EntityManagerInterface $entityManager,platRepository $rep,MenuPlatRepository $plm,MenuRepository $rest): Response
    {
        $id =$restaurant->getMenuid();
        $idmenu=$rest->idresto($id);

        $plats=$plm->idplatget($idmenu);
        return $this->render('restaurant/consulterResto.html.twig', [
            'restaurant' => $restaurant,'plats'=>$plats
        ]);
    
    }


     /**
 * @Route("/menurestoadmin/{id}", name="restaurantMenuadmin_show", methods={"GET"})
 */
public function showmenuadmin(Restaurant $restaurant,EntityManagerInterface $entityManager,platRepository $rep,MenuPlatRepository $plm,MenuRepository $rest,PlatRepository $plt): Response
{
    $id =$restaurant->getMenuid();
    $idmenu=$rest->idresto($id);
    $plats=$plm->idplatget($idmenu);
    return $this->render('restaurant/restaurantmenuadmin.html.twig', [
        'restaurant' => $restaurant,'plats'=>$plats
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
/** @var UploadedFile $brochureFile */
$image = $form->get('image')->getData();

if ($image) {
    $newFilename = uniqid() . '.' . $image->guessExtension();

    try {
        $image->move(
            $this->getParameter('restaurant_picture'),
            $newFilename
        );
    } catch (FileException $e) {
    }

    $restaurant->setImage($newFilename);
}

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
     * @Route("/recherche", name="restaurantRecherche")
     */
    public function recherche(RestaurantRepository $rep,Request $request): Response
    {
        $data=$request->get('rech');
        $restaurants=$rep->findBy(['nom'=>$data]);
       
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants,
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
