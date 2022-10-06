<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\LivreImage;
use App\Form\LivreImageType;
use App\Repository\LivreImageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/livreimage')]
class AdminLivreImageController extends AbstractController
{
    #[Route('/', name: 'app_admin_livre_image_index', methods: ['GET'])]
    public function index(LivreImageRepository $livreImageRepository): Response
    {
        return $this->render('admin_livre_image/index.html.twig', [
            'livre_images' => $livreImageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_livre_image_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LivreImageRepository $livreImageRepository): Response
    {
        $livreImage = new LivreImage();
        $form = $this->createForm(LivreImageType::class, $livreImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livreImageRepository->add($livreImage, true);

            return $this->redirectToRoute('app_admin_livre_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_livre_image/new.html.twig', [
            'livre_image' => $livreImage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_livre_image_show', methods: ['GET'])]
    public function show(LivreImage $livreImage): Response
    {
        return $this->render('admin_livre_image/show.html.twig', [
            'livre_image' => $livreImage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_livre_image_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LivreImage $livreImage, LivreImageRepository $livreImageRepository): Response
    {
        $form = $this->createForm(LivreImageType::class, $livreImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livreImage->setUpdatedAt(new DateTimeImmutable());
            $livreImageRepository->add($livreImage, true);

            return $this->redirectToRoute('app_admin_livre_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_livre_image/edit.html.twig', [
            'livre_image' => $livreImage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_livre_image_delete', methods: ['POST'])]
    public function delete(Request $request, LivreImage $livreImage, LivreImageRepository $livreImageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livreImage->getId(), $request->request->get('_token'))) {
            $livreImageRepository->remove($livreImage, true);
        }

        return $this->redirectToRoute('app_admin_livre_image_index', [], Response::HTTP_SEE_OTHER);
    }
}