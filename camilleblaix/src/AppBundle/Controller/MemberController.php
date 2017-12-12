<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/11/2017
 * Time: 09:28
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class MemberController extends Controller
{

    /**'MemberList'=> [1=>['nom' => 'Blaix', 'prenom' => 'Camille', 'email' => 'camille@gmail.com', 'image' => 'img/logo-femme.jpg'],
    2=>['nom' => 'Mercan', 'prenom' => 'Brandon', 'email' => 'brandon@gmail.com', 'image' => 'img/logo.jpg']
    ]**/

    private $list = [
        ['nom' => 'Blaix', 'prenom' => 'Camille', 'email' => 'camille@gmail.com', 'image' => 'logo-femme.jpg'],
        ['nom' => 'Mercan', 'prenom' => 'Brandon', 'email' => 'brandon@gmail.com', 'image' => 'logo.jpg'],
    ];

    /**
     * @Route("/membres", name="membres")
     */
    public function membersAction(){

        return $this->render('exercice/members.html.twig', [

            'list' => $this->list
        ]);
    }


    /**
     * @Route("/details/{id}",
     *     name="details"
     *     )
     *
     */
    public function detailsAction($id) {
        return $this->render('exercice/details.html.twig', [
            'details' => $this->list[$id]
        ]);
    }

}