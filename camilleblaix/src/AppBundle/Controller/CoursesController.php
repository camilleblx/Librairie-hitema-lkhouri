<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/12/2017
 * Time: 13:41
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class CoursesController extends Controller
{

    /**
     * @Route("/courses", name="courses")
     */
    public function indexAction()
    {
        //return $this->render('courses/index.html.twig');
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Formation::class);
        $results = $repository->findAll();
        //exit($results);
        return $this->render('courses/index.html.twig', [
            'results' => $results
        ]);
    }

    /**
     * @Route("/courses/{slug}", name="courses.modules")
     */
    public function moduleAction($slug) {
        //doctrine

        $doctrine = $this->getDoctrine();
        $result = $doctrine->getRepository(Formation::class)->findOneBy([
            'slug' => $slug
        ]);
        //$slug = $repository->findOneBy($slug);
        return $this->render('courses/form.html.twig', [
            'results' => $result
        ]);
    }
    /**
     * @Route("/course/query", name="courses.query")
     *
     */

    public function queryAction() {
        //doctrine
        $doctrine = $this->getDoctrine();

        //appel d'une méthode de la classe de dépôt (Repository)

        $result = $doctrine->getRepository(Formation::class)->testQuery();

        exit(dump($result));

    }


}

