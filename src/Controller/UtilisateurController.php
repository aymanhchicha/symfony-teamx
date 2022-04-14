<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\SigninType;
use App\Form\SignupType;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request): Response
    {

        return $this->render('Admin/index.html.twig');
    }
    /**
     * @Route("/signup", name="signup")
     */
    public function signup(Request $request): Response
    {
        $u = new Utilisateur();

        $form=$this->createForm(SignupType::class,$u);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($u);
            $em->flush();

            return $this->redirectToRoute('table');
        }
        return $this->render('utilisateur/signup.html.twig',['f'=>$form->createView()]);
    }
    /**
     * @Route("/signin", name="signin")
     */
    public function signin(Request $request): Response
    {
        $u=new Utilisateur();
        $form=$this->createForm(SigninType::class,$u);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            $us=$this->getDoctrine()->getRepository(Utilisateur::class)->findBy(array('email'=>'fff'));
            return $this->render('utilisateur/index.html.twig',['u'=>$us]);
        }
        return $this->render('utilisateur/signin.html.twig',['f'=>$form->createView()]);

    }
    /**
     * @Route("/table", name="table")
     */
    public function affiche(Request $request): Response
    {
        $u=$this->getDoctrine()->getManager()->getRepository(Utilisateur::class)->findAll();
        return $this->render('utilisateur/index.html.twig',['f'=>$u]);

    }
    /**
     * @Route("/modifuser/{id}", name="modifier")
     */
    public function modifier(Request $request,$id): Response
    {
        $u=$this->getDoctrine()->getManager()->getRepository(Utilisateur::class)->find($id);
        $form=$this->createForm(SignupType::class,$u);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();

            $em->flush();

            return $this->redirectToRoute('table');
        }
        return $this->render('utilisateur/updateuser.html.twig',['f'=>$form->createView()]);
    }
    /**
     * @Route("/suppuser/{id}", name="suppuser")
     */
    public function supprimer(Utilisateur $u): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($u);
        $em->flush();
        return $this->redirectToRoute('table');

    }

}
