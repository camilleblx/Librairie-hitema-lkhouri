<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/11/2017
 * Time: 14:39
 */

namespace AppBundle\Controller;


use AppBundle\Form\ContactType;
use AppBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{

    /**
     * @Route("/contact", name="contact")
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
        $repository = $doctrine->getRepository(Contact::class);
        $results = $repository->findAll();
        //exit($results);
        return $this->render ('contact/index.html.twig', [
            'results' => $results
        ]);
    }

    /**
     * @Route("/contact/form", name="contact.form", defaults= { "id" = null })
     * @Route("/contact/form/update/{id}", name="contact.update")
     */
    public function formAction(Request $request, $id) {
        //doctrine
        $doctrine = $this->getDoctrine();

        //instance nécéssaire au formulaire
        //if((id !== null {}else { $entity = new Contact();}
        $entity = $id ? $doctrine->getRepository(Contact::class)->find($id)  : new Contact();
        $type = ContactType::class;

        // creation du formulaire
        $form = $this->createForm($type,$entity);

        //récupération de la saisie
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            /*
             * Insertion dans la base (doctrine)
             * 2 branches :
             *  getManager() : UPDATE / DELETE / INSERT
             *      persist : file d'attente des requêtes SQL
             *      flush : execution des requêtes
             *  getRepository() : SELECT, accès à la classe Repository
             *
             */


            $manager = $doctrine->getManager();

            $manager->persist($data);
            $manager->flush();

            //message de confirmation
            $message = "Le contact a été ajouté";

            //addFlash
            $this->addFlash('notice', $message);

            //redirection
            return $this->redirectToRoute('contact');

        }

        return $this->render ('contact/form.html.twig',[ 'form'=>$form->createView()]);
    }


    /**
     * @Route("/contact/delete/{id}", name="contact.delete")
     */
    public function deleteAction($id) {
        /*
         * selection puis une suppression (remove va remplacer persist)
         */
        $doctrine = $this->getDoctrine();
        $contact = $doctrine->getRepository(Contact::class)->find($id);
        $manager = $doctrine->getManager();

        $manager->remove($contact);
        $manager->flush();

        //message /redirection

        $this->addFlash('notion',
            "Le contact - {$contact->getFirstname()} {$contact->getLastname()} - a été supprimé");
            return $this->redirectToRoute('contact');
    }

}