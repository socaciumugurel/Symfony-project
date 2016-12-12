<?php

// php bin/console doctrine:database:create
// doctrine:schema:update --dump-sql --force
// mysql -u root lovefood


namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeRepository")
 * @ORM\Table(name="recipes")
 */
class Recipes
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Acest camp este obligatoriu")
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $method;

    /**
     * @ORM\Column(type="string")
     * @Assert\Range(min="1", minMessage="Cel putin o portie")
     */
    private $pieces;

    /**
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @ORM\Column(type="integer")
     */
    private $rates;


    /**
     * @ORM\Column(type="integer")
     */
    private $likes;


    /**
     * @ORM\Column(type="integer")
     */
    private $preparation_time;


    /**
     * @ORM\Column(type="integer")
     */
    private $cook_time;

    /**
     * @ORM\OneToMany(targetEntity="Ingredients",mappedBy="recipes")
     */
    private $ingredients;

    /**
     * @return ArrayCollection|Ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients(Ingredients $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="recipes")
     * @ORM\JoinColumn(name="comment_id", referencedColumnName="id")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="RecipePictures", mappedBy="recipes")
     * @ORM\JoinColumn(name="fileLocation_id", referencedColumnName="id")
     */
    private $fileLocation;

    /**
     * @return ArrayCollection|RecipePictures
     */
    public function getFileLocation()
    {
        return $this->fileLocation;
    }

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
        $this->fileLocation = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Comments[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     *
     */
    public function setComments(Comments $comments)
    {
        $this->comments = $comments;
    }



    /**
     * @return mixed
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param mixed $rates
     */
    public function setRates($rates)
    {
        $this->rates = $rates;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getPieces()
    {
        return $this->pieces;
    }

    /**
     * @param mixed $pieces
     */
    public function setPieces($pieces)
    {
        $this->pieces = $pieces;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getPreparationTime()
    {
        return $this->preparation_time;
    }

    /**
     * @param mixed $preparation_time
     */
    public function setPreparationTime($preparation_time)
    {
        $this->preparation_time = $preparation_time;
    }

    /**
     * @return mixed
     */
    public function getCookTime()
    {
        return $this->cook_time;
    }

    /**
     * @param mixed $cook_time
     */
    public function setCookTime($cook_time)
    {
        $this->cook_time = $cook_time;
    }




}
