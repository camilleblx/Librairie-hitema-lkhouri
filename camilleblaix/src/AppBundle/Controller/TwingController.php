<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/11/2017
 * Time: 14:24
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TwingController extends Controller
{

    /**
     * @Route("/layout", name="layout")
     */
        public function layoutAction() {
            return $this->render('twig/layout.html.twig');
        }




}

