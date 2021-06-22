<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(BirdModel $birdModel, SessionInterface $session): Response
    {
        // On récupère l'id du dernier oiseau vue
        $lastBirdId = $session->get('lastBirdId');
        // Si cette valeur n'est pas nul on récupère les infos de l'oiseau
        if ($lastBirdId !== null) {
            $lastBird = $birdModel->getBird($lastBirdId);
        } else {
            // Sinon on défini $bird à null pas
            // Parce que quoi qu'il arrive on envoi une variable lastBird à twig
            $lastBird = null;
        }

        // On demande de générer la vue main/index.html.twig
        // En lui envoyant la liste de tous les oiesaux
        return $this->render('main/index.html.twig', [
            'birdsList' => $birdModel->getBirds(),
            'lastBird' => $lastBird,
            'lastBirdId' => $lastBirdId
        ]);
    }

    #[Route('/bird/{id}', name: 'bird_single', requirements: ['id' => '\d+'])]
    public function birdSingle(BirdModel $birdModel, int $id, SessionInterface $session): Response
    {

        // On ajout l'oiseau à la session
        // Dans un autre contrôleur, on pourra récupérer l'id avec $requestStack->get('lastBirdId')
        $session->set('lastBirdId', $id);

        // On récupère les données de l'oiseau à la session
        $bird = $birdModel->getBird($id);

        // Si $bird est null, on lève une exception comme quoi la ressource n'existe pas
        if ($bird == null) {
            throw $this->createNotFoundException('Cet oiseau n\'existe pas !');
        }

        // On demande de générer la vue main/single.html.twig
        // En lui envoyant une variable bird qui contient les informations de l'oiseau
        return $this->render('main/single.html.twig', [
            'bird' => $bird
        ]);
    }

    #[Route('/download/calendar', name: 'calendar')]
    public function calendarDownload(): Response
    {
        $file = new File('C:\Users\Maida\Desktop\8kode\AngryBirds\angrybirds\public\assets\images\white.png');
        return $this->file($file, 'calendar.png');
    }
}
