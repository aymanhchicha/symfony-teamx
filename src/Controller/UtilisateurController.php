<?php

namespace App\Controller;

use App\Entity\Search;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Entity\Utilisateur;
use App\Form\SigninType;
use App\Form\SignupType;
use App\Form\UserSearchType;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request): Response
    {

        return $this->render('Admin/index.html.twig');
    }



    private $pass;
    /**
     * @Route("/modifuser/{id}", name="modifier")
     */
    public function modifier(Request $request,$id): Response
    {

        $u=$this->getDoctrine()->getManager()->getRepository(User::class)->find($id);

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
    public function supprimer(User $u): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($u);
        $em->flush();
        return $this->redirectToRoute('table');

    }

}
