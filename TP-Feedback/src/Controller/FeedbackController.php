<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Feedback;
use App\Form\FeedbackType;

class FeedbackController extends AbstractController
{
    /* #[Route('/feedback', name: 'feedback')]
    public function index(Request $request): Response
    {
        $feedback = new Feedback();
        $feedback->setDateSoumission(new \DateTime());
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        // Afficher les données pour le TP (pas de base de données)
        return $this->render('feedback/result.html.twig', [
        'feedback' => $feedback,
        ]);
        }
        return $this->render('feedback/index.html.twig', [
        'form' => $form->createView(),
        ]);
    }*/


    #[Route('/feedback', name: 'feedback')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Set the date of submission if it's not handled by the form
            if (null === $feedback->getDateSoumission()) {
                $feedback->setDateSoumission(new \DateTime());
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($feedback);
            $entityManager->flush();

            // Redirect or add flash message here after successful save
            return $this->redirectToRoute('feedback_list');
        }

        return $this->render('feedback/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /* avec la récuperation des noms des chaps
    #[Route('/feedback/list', name: 'feedback_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $metadata = $entityManager->getClassMetadata(Feedback::class);
        $fieldNames = $metadata->getFieldNames(); // Cela retourne les noms des champs de l'entité Feedback

        $feedbacks = $entityManager->getRepository(Feedback::class)->findAll();

        $feedbackData = [];

        foreach ($feedbacks as $feedback) {
            $data = [];
            foreach ($fieldNames as $fieldName) {
                $getter = 'get' . ucfirst($fieldName);
                if (method_exists($feedback, $getter)) {
                    $fieldValue = $feedback->$getter();
                    if ($fieldValue instanceof \DateTime) {
                        // Convertir DateTime en chaîne de caractères
                        $data[$fieldName] = $fieldValue->format('Y-m-d H:i:s');
                    } else {
                        // Copier la valeur telle quelle
                        $data[$fieldName] = $fieldValue;
                    }
                }
            }
            $feedbackData[] = $data;
        }

        return $this->render('feedback/list.html.twig', [
            'feedbacks' => $feedbackData,
            'fieldNames' => $fieldNames,
        ]);

    }*/

/* avec declaration explicite des noms des champs */
    #[Route('/feedback/list', name: 'feedback_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $feedbacks = $doctrine->getRepository(Feedback::class)->findAll();
        return $this->render('feedback/list.html.twig', ['feedbacks' => $feedbacks]);
    }

    #[Route('/feedback/edit/{id}', name: 'feedback_edit')]
    public function edit(Request $request, ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $feedback = $entityManager->getRepository(Feedback::class)->find($id);
        if (!$feedback) {
            throw $this->createNotFoundException('No feedback found for id '.$id);
        }
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('feedback_list');
        }
        return $this->render('feedback/edit.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/feedback/delete/{id}', name: 'feedback_delete')]
    public function delete(ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $feedback = $entityManager->getRepository(Feedback::class)->find($id);
        if ($feedback) {
            $entityManager->remove($feedback);
            $entityManager->flush();
        }
        return $this->redirectToRoute('feedback_list');
    }
}
