<?php

namespace App\Repository;

use App\Entity\Todo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
/**
 * @method Todo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Todo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Todo[]    findAll()
 * @method Todo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TodoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager) 
    {
        parent::__construct($registry, Todo::class);
        $this->manager = $manager;
        //investigar por qué tengo que usar manager****!IMPORTANT
    }

    //Lista de todos los to-dos
    public function listAll(){
        return $this->findAll();
    }

    //Guardar nuevo to-do
    public function saveTodo($title, $description){
        $newTodo = new Todo();

        $newTodo
            ->setTitle($title)
            ->setDescription($description)
            ->setIsDone(false);

        $this->manager->persist($newTodo);
        $this->manager->flush();
        return $newTodo->getId();
    }

    public function delete($id){
        $todo = $this->find($id);
        if(empty($todo)){
            return false;
        }
        $this->manager->remove($todo);
        $this->manager->flush();
        return true;
    }
    // /**
    //  * @return Todo[] Returns an array of Todo objects
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
    public function findOneBySomeField($value): ?Todo
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
?>