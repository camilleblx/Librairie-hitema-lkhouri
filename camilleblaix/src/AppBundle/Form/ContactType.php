<?php

namespace AppBundle\Form;

use AppBundle\Entity\OperatingSystem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use AppBundle\Entity\Hobby;
use Symfony\Component\Validator\Constraints\Count;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
         *  add
         *      - nom du champs utilisé dans la vue
         *      - type de champs
         *      - options du champ
         *          contraintes de validation : http//symfony constraint
         */

        $builder
            ->add('firstname', TextType::class, [
                'constraints' => [
                new NotBlank([
                    'message' => "Vous n'avez pas saisi votre prénom."
                ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Votre prénom doit comporter 2 caractères au minimum."
                    ])
                ]
            ])
            ->add('lastname', TextareaType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            /*
             * EntityType : permet de relier un champ à une entité
             * class permet de définir l'entité ciblée
             * choice_label : choix de la propriété de l'entité à  afficher
             * case a cocher
             */
            ->add('hobbies', EntityType::class, [
                'class' => Hobby::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'constraints' => [
                    new Count([
                    'min' => 1,
                    'minMessage' => "Vous devez sélectionner au minimum un loisir."
                    ])
                ]
            ])

            /*
             * Systeme d'exploitation : boutons radio
             */
            ->add('operatingSystem', EntityType::class, [
                'class' => OperatingSystem::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => false
            ])

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
