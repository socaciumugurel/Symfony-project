<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/3/2016
 * Time: 3:09 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentsRepository")
 * @ORM\Table(name="comments")
 */
class Comments
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
    private $comment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_of_comment;

    /**
     * @ORM\Column(type="integer")
     */
    private $likes;

    /**
     * @ORM\ManyToOne(targetEntity="Recipes" , inversedBy="comments")
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getDateOfComment()
    {
        return $this->date_of_comment;
    }

    /**
     * @param mixed $date_of_comment
     */
    public function setDateOfComment($date_of_comment)
    {
        $this->date_of_comment = $date_of_comment;
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




}