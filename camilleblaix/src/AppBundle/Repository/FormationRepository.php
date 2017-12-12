<?php

namespace AppBundle\Repository;

/**
 * FormationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FormationRepository extends \Doctrine\ORM\EntityRepository
{

    public function testQuery() {
        /*
         * createQueryBuilder : constructeur de requete
         *  choix des propriétés de l'entité en utilisant l'alian
         *  renvoie un array de array
         *  where adwhere orwhere
         *  utilisation de where en première condition
         *  à partir de la deuxième condition : utilisation de andwhere ou orwhere
         * définir l'alias de l'entité
         * getQuery : exécution de la requ^te / appel de cette méthode en avant dernière position
         * récupération des resultats : dernière position
         *
         *  getResult : renvoi un array d'objets
         */


        $query = $this->createQueryBuilder('courseAlias')
            ->select('courseAlias.formation', 'courseAlias.slug')
            ->where('courseAlias.formation = :formationParam')
            ->andWhere('courseAlias.formation LIKE :likeParam')
            ->setParameters([
                'formationParam' => 'commerce',
                'likeParam' => '%commerce%'
            ])
            ->getQuery()
            ->getSingleResult()
            //->getResult()

        ;

        //requête de regroupement
        $query = $this->createQueryBuilder('courseAlias')
            ->getQuery()
            ->getResult()
            ;


        // retour des résultats
        return $query ;
    }
}