<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/3/2016
 * Time: 1:59 PM
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class RecipeRepository extends EntityRepository
{
    /**
     * @return Recipes[]
     */
    public function findBestRecipes()
    {
        return $this->createQueryBuilder("recipes")
            ->andWhere("recipes.likes < :likes")
            ->setParameter('likes', 100)
            ->addOrderBy("recipes.likes")
            ->getQuery()
            ->execute();
    }
}