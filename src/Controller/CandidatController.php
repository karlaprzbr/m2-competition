<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\User;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidat")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/", name="app_candidat_index", methods={"GET"})
     */
    public function index(CandidatRepository $candidatRepository): Response
    {
        return $this->render('candidat/index.html.twig', [
            'candidats' => $candidatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_candidat_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CandidatRepository $candidatRepository): Response
    {
        $candidat = new Candidat();
        $candidat->setUser($this->getUser());
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidatRepository->add($candidat);
            return $this->redirectToRoute('app_candidat_show', ['id'=>$this->getUser()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('candidat/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_candidat_show", methods={"GET"})
     */
    public function show(User $user, CandidatRepository $candidatRepository): Response
    {
        if($user->getCandidat()) {
            $candidat = $user->getCandidat();
            $taux = $candidatRepository->tauxDeRemplissage($candidat);
        } else {
            $candidat = null;
        }
        return $this->render('candidat/show.html.twig', [
            'candidat' => $candidat,
            'user'=>$user,
            'taux'=>$taux
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_candidat_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Candidat $candidat, CandidatRepository $candidatRepository): Response
    {
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidatRepository->add($candidat);
            return $this->redirectToRoute('app_candidat_show', ['id'=>$this->getUser()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_candidat_delete", methods={"POST"})
     */
    public function delete(Request $request, Candidat $candidat, CandidatRepository $candidatRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidat->getId(), $request->request->get('_token'))) {
            $candidatRepository->remove($candidat);
        }

        return $this->redirectToRoute('app_candidat_show', ['id'=>$this->getUser()->getId()], Response::HTTP_SEE_OTHER);
    }
}
