<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\AjoutType;
use App\Form\SignupType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request,MailService $mailer)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));



            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $mailmessage= $user->getNom().' '.$user->getPrenom().' '.'Welcome to our application ';
            $email=$user->getEmail();
            $mailer->index($email,$mailmessage);
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouter(Request $request,MailService $mailer)
    {
        $user = new User();

        $form = $this->createForm(AjoutType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));



            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $mailmessage= $user->getNom().' '.$user->getPrenom().' '.'Welcome to our application ';
            $email=$user->getEmail();
            $mailer->index($email,$mailmessage);
            return $this->redirectToRoute('table');
        }

        return $this->render('utilisateur/signup.html.twig', [
            'f' => $form->createView(),
        ]);
    }
}