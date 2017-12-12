<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/12/2017
 * Time: 13:29
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Livres ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BooksController extends Controller
{

    /**
     * @Route("/bookstore", name="bookstore")
     */
    public function indexAction() {
        /*
         * getRepository() : SELECT
         *4 méthodes de sélection :
         *  find(id) : récupérer un enregistrement par la PK
         * findAll() : récupérer tous les enregistrements
         * findBy() : récupérer un enregistrement par une liste de critères
        */
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Categorie::class);
        $results = $repository->findAll();
        //exit($results);
        return $this->render('bookstore/index.html.twig', [
            'results' => $results
        ]);

    }

    /**
     * @Route("/bookstore/category/{slug}", name="bookstore.livres")
     */
    public function livresAction($slug) {
        //doctrine

        $doctrine = $this->getDoctrine();
        $result = $doctrine->getRepository(Categorie::class)->findOneBy([
            'slug' => $slug
        ]);
        //$slug = $repository->findOneBy($slug);
        return $this->render('bookstore/livres.html.twig', [
            'results' => $result
        ]);
    }

    /**
     * @Route("/bookstore/book/{slug}", name="bookstore.details")
     */
    public function detailsAction($slug) {
        //doctrine

        $doctrine = $this->getDoctrine();

        $result = $doctrine->getRepository(Livres::class)->findOneBy([
            'slug' => $slug
        ]);

        //$slug = $repository->findOneBy($slug);
        return $this->render('bookstore/details.html.twig', [
            'results' => $result,
        ]);
    }

}