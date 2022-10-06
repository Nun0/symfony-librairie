<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_auteur')]
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteurs' =>  $auteurRepository->findAll(),
        ]);
    }

    #[Route('/auteur/search', name: 'app_auteur_search')]
    public function search(AuteurRepository $auteurRepository, Request $request): Response
    {
        $auteurs = $auteurRepository->search($request->request->get('search-value'));
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    #[Route('/auteur/{id}', name: 'app_auteur_show')]
    public function show(AuteurRepository $auteurRepository, Int $id): Response
    {
        return $this->render('auteur/show.html.twig', [
            'auteur' =>  $auteurRepository->find($id),
        ]);
    }



}
