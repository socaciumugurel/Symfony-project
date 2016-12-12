<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/5/2016
 * Time: 4:25 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="recipe_pictures")
 */
class RecipePictures
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $fileLocation;


    /**
     * @ORM\ManyToOne(targetEntity="Recipes", inversedBy="fileLocation")
     */
    private $recipes;

    /**
     * @return mixed
     */
    public function getRecipes()
    {
        return $this->recipes;
    }

    /**
     * @param mixed $recipes
     */
    public function setRecipes(Recipes $recipes)
    {
        $this->recipes = $recipes;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getFileLocation()
    {
        return $this->fileLocation;
    }

    /**
     * @param mixed $fileLocation
     */
    public function setFileLocation($fileLocation)
    {
        $this->fileLocation = $fileLocation;
    }
}