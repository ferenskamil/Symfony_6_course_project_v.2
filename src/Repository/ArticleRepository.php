<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function getLastArticle() : ?Article
    {
        /** To nam powinno zwrócić całą tabelę, do której jest przypisane to repozytorium
         * Jako parametr ustawiamy 'alias' który jest identycznym aliasem jak w SQL i oznacza
         * jak chcemy się odnosić do omawianej tabeli. */
        $queryBuilder = $this->createQueryBuilder(alias: 'a');

        /** Posortuj wyniki */
        $queryBuilder->orderBy('a.addedAt' , 'DESC');

        /** Wybierz pierwszy */
        $queryBuilder->setMaxResults(1);

        /** Wykonaj i zwróć zapytanie */
        // return $queryBuilder->getQuery()->execute();
        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

//    /**
//     * @return Article[] Returns an array of Article objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
