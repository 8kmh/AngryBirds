<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'api')]
    public function index(BirdModel $birdModel): Response
    {
        // L'objectif ici est de créer une route qui retourne en JSON qui retourne tout les oiseaux

        // On doit d'abord récupérer les oiseaux en
        $birdsList = $birdModel->getBirds();

        // Il nous faut maintenat retourner la liste des oiseaux sérialisées en Json
        return $this->json($birdsList);
    }

    #[Route('/api/bird/{id}', name: 'api_bird_single', requirements: ['id' => '\d+'])]
    public function birdSingle(BirdModel $birdModel, int $id): Response
    {

        // On récupère les données de l'oiseau à la session
        $bird = $birdModel->getBird($id);

        // Si $bird est null, on lève une exception comme quoi la ressource n'existe pas
        if ($bird == null) {
            throw $this->createNotFoundException('Cet oiseau n\'existe pas !');
        }

       return $this->json($bird);
    }
}
