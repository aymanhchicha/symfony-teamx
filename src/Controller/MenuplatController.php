<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\Menuplat;
use App\Entity\Plat;
use App\Form\MenuplatType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/menuplat")
 */
class MenuplatController extends AbstractController
{
    /**
     * @Route("/", name="menuplat_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $menuplats = $entityManager
            ->getRepository(Menuplat::class)
            ->findAll();

        return $this->render('menuplat/index.html.twig', [
            'menuplats' => $menuplats
        ]);
    }

    /**
     * @Route("/new", name="menuplat_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $menuplat = new Menuplat();
        $form = $this->createForm(MenuplatType::class, $menuplat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($menuplat);
            $entityManager->flush();

            return $this->redirectToRoute('menuplat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('menuplat/new.html.twig', [
            'menuplat' => $menuplat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menuplat_show", methods={"GET"})
     */
    public function show(Menuplat $menuplat): Response
    {
        return $this->render('menuplat/show.html.twig', [
            'menuplat' => $menuplat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="menuplat_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Menuplat $menuplat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MenuplatType::class, $menuplat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('menuplat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('menuplat/edit.html.twig', [
            'menuplat' => $menuplat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menuplat_delete", methods={"POST"})
     */
    public function delete(Request $request, Menuplat $menuplat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$menuplat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($menuplat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('menuplat_index', [], Response::HTTP_SEE_OTHER);
    }
}
