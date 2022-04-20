<?php

namespace App\Controller;

use App\Repository\FeaturedRepository;
use App\Repository\HeroRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(
        HeroRepository     $heroRepository,
        SkillRepository    $skillRepository,
        FeaturedRepository $featuredRepository,
        ProjectRepository $projectRepository
    ): Response
    {
        return $this->render('home/index.html.twig', [
            'hero' => $heroRepository->findAll(),
            'featured' => $featuredRepository->find(1),
            'skills' => $skillRepository->findAll(),
            'projects' => $projectRepository->findAll(),
        ]);
    }
}
