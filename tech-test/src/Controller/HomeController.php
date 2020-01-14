<?php

namespace App\Controller;

use App\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/place", name="app_place")
     * @param Request $request
     * @return Response
     */
    public function place(Request $request)
    {
        $places = $this->getDoctrine()
            ->getRepository(Place::class)
            ->findAll();

        return $this->render('home/place.html.twig', [
            'places' => $places,
        ]);
    }

}
