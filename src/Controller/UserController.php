<?php

namespace App\Controller;

use App\Entity\Search;
use App\Entity\User;
use App\Form\UserSearchType;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(UserRepository $repo){
        $this->repo =$repo;


    }
    /**
     * @Route("/table", name="table")
     */
    public function affiche(Request $request): Response
    {
        $search=new Search();
        $form=$this->createForm(UserSearchType::class,$search);
        $form->handleRequest($request);

       $u= $this->repo->findAllVisibleQuery($search);

        return $this->render('utilisateur/index.html.twig',['f'=>$u,'search'=>$form->createView()]);

    }
}
