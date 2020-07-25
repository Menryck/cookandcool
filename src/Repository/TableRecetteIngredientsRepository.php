<?php

namespace App\Repository;

use App\Entity\TableRecetteIngredients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TableRecetteIngredients|null find($id, $lockMode = null, $lockVersion = null)
 * @method TableRecetteIngredients|null findOneBy(array $criteria, array $orderBy = null)
 * @method TableRecetteIngredients[]    findAll()
 * @method TableRecetteIngredients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TableRecetteIngredientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TableRecetteIngredients::class);
    }

    // /**
    //  * @return TableRecetteIngredients[] Returns an array of TableRecetteIngredients objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TableRecetteIngredients
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
