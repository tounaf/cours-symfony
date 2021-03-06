<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/hello/{name}/{age}/{adresse}", name="hello")
     */
    public function index(Request $request)
    {

        $name = $request->get('name');
        $age = $request->get('age');
        $adresse = $request->get('adresse');
        return $this->render('home/index.html.twig', [
            'name' => $name,
            "age" => $age,
            'adresse' => $adresse
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render("home/root_page.html.twig");
    }
}
