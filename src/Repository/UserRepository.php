<?php

namespace App\Repository;

use App\Entity\Search;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();


    }
    /**
     * @return User[]
     */
    public function findtest():array
    {
        return $this->findVisibleQuery()
            ->getQuery()
            ->getResult();
    }
    /**
     * @return User[]
     */

    public function findAllVisibleQuery(Search $search):array
    {
        $query = $this->findVisibleQuery();
        if($search->getNom()){
            $query= $query
                ->andWhere('u.nom = :name')
                ->setParameter('name',$search->getNom());
        }if($search->getPrenom()){
            $query= $query
                ->andwhere('u.prenom = :pre')
                ->setParameter('pre',$search->getPrenom());
        }
        return $query->getQuery()
            ->getResult();
    }
   

    private function findVisibleQuery() :QueryBuilder
    {
        return $this->createQueryBuilder('u')

        ;
    }


    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
