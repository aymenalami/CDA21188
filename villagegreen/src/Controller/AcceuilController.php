<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\ProduitsRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(CategorieRepository $repo): Response
    {
        $categories = $repo->findAll();
        return $this->render('accueil/accueil.html.twig', [
            'categories' => $categories,'menu' => $repo->findAll()
        ]);
    }

    
 
/**
     * @Route("/categorie/{id}", name="categories")
     */
    public function categories(SousCategoriesRepository $repos,$id,CategorieRepository $menu): Response
    {
        dump($repos->findBy(['parent'=>$id]));
        return $this->render('accueil/categorie.html.twig', [
            'SousCat' => $repos->findBy(['parent'=>$id]),
            'menu' => $menu->findAll()
        ]);
    }

    /**
     * @Route("/produits/{id}", name="produits")
     */
    public function souscategorie(ProduitsRepository $repos,$id,CategorieRepository $menu): Response
    {
        dump($repos->findAll());
        return $this->render('produits/index.html.twig', [
            'Produits'=>$repos->findBy(['SousCat'=>$id]),
            'menu' => $menu->findAll()

        ]);
    }
}
    