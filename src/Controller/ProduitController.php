<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index()
    {
        // communiquer avec base de donnees
        $em = $this->getDoctrine()->getManager();

        // findAll() => recuperer tout == select * from produit
//        $nom = "Cocacola";
//        $listProduis = $em->getRepository(Produit::class)->findProduitByName($nom);

        $listProduis = $em->getRepository(Produit::class)->findAll();

        return $this->render('produit/index.html.twig', [
            'produits' => $listProduis
        ]);
    }

    /**
     * @Route("/produit/voir/{id}", name="voir_produit")
     */
    public function voir(Request $request)
    {
        // recuperer le parametre id /produit/voir/1
        $id = $request->get('id');

        // communiquer avec base de donnees
        $em = $this->getDoctrine()->getManager();

        //find() => recuperer le produit where id = $id == select * from produit where id = $id
        $produit = $em->getRepository(Produit::class)->find($id);

        return $this->render('produit/voir.html.twig', array(
            'produit' => $produit
        ));

    }
}
