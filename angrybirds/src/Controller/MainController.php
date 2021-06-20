<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(BirdModel $birdModel): Response
    {
        // $birdModel = new BirdModel();
        // $birdsList = $birdModel->getBirds();

        // $birdsList = (new BirdModel())->getBirds();

        return $this->render('main/index.html.twig', [
            'birdsList' => $birdModel->getBirds()
        ]);
    }

    #[Route('/bird/{id}', name: 'bird_single')]
    public function birdSingle(BirdModel $birdModel, $id): Response
    {
        
        return $this->render('main/single.html.twig', [
            'bird' => $birdModel->getBird($id)
        ]);
    }

    #[Route('/download/calendar', name: 'calendar')]
    public function calendarDownload(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
