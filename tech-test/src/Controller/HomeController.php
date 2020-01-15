<?php

namespace App\Controller;

use App\Entity\Place;
use App\Entity\Upload;
use App\Form\UploadType;
use App\Repository\UploadRepository;
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
     * @Route("/place", name="app_place", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function place(Request $request) : Response
    {
        $places = $this->getDoctrine()
            ->getRepository(Place::class)
            ->findAll();

        $upload = new Upload();
        $form = $this->createForm(UploadType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form['name']->getData();
            $data->move( "upload_directory", $csv = $data->openFile());


            foreach ($csv as $key){
                $row = str_getcsv($key, ';');
                $place = new Place();

                $place->setName($row[0])
                    ->setAdress($row[0])
                    ->setCity($row[0])
                    ->setZipCode($row[0]);
            }


        }
        return $this->render('home/place.html.twig', [
            'places' => $places,
            'form' =>$form->createView(),
            'upload'=>$upload,
        ]);
    }


}

