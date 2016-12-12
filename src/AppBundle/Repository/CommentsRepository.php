<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/5/2016
 * Time: 9:25 AM
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CommentsRepository extends EntityRepository
{
    function findAllNotesForRecipe(Recipes $recipe)
    {
        return $this->createQueryBuilder("comment")
            ->getQuery()
            ->execute();
    }
}