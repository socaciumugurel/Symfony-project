<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/2/2016
 * Time: 12:03 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Comments;
use AppBundle\Entity\Ingredients;
use AppBundle\Entity\RecipePictures;
use AppBundle\Entity\Recipes;
use AppBundle\Form\Comment;
use AppBundle\Form\ImageType;
use AppBundle\Form\NewRecipeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RecipesController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    function homeAction()
    {
        return $this->render("/default/index.html.twig");
    }


    /**
     * @Route("/about", name="about")
     */
    function aboutAction()
    {
        return $this->render("/default/about.html.twig");
    }




    /**
     * @Route("/recipes", name="showRecipes")
     */
    function showAction()
    {
        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Recipes');
        $recipes = $em->findBestRecipes();
        dump($recipes);
        return $this->render("/default/recipes.html.twig", array("recipes"=>$recipes));
    }


    /**
     * @Route("/recipes/{id}", name="recipeDetails")
     */
    function detailsAction(Recipes $recipe, $id, Request $request)
    {

        $recipe = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Recipes')
            ->findOneBy(["id" => $id]);

        $picturesArray = $recipe->getFileLocation();
        foreach ($picturesArray as $picture){
            $pictures[] = $picture->getFileLocation();
        }

        $ingredientsArray = $recipe->getIngredients();
        foreach ($ingredientsArray as $ingredient)
        {
            $ingredientArray[] = $ingredient;
        }

        $comments = new Comments();
        $form = $this->createForm(Comment::class,$comments);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $comments->setLikes(0);
            $comments->setDateOfComment(new \DateTime('now'));
            $comments->setRecipes($recipe);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comments);
            $em->flush();
            $this->addFlash("success", "Felicitari!!! comentariu a fost adaugat cu succees!");
            return $this->redirect('/recipes/' . $id);
        }


        if(!$recipe){
            throw $this->createNotFoundException("Reteta nu a putut fi gasita");
        }
        return $this->render("/default/recipe.html.twig", array(
            "recipe"=>$recipe,
            "pictures"=>$pictures,
            "form"=>$form->createView(),
            "ingredients"=>$ingredientsArray));
    }

    /**
     * @Route("/recipes/{id}/comments", name="recipeComments")
     */
    function commentsAction(Recipes $recipe)
    {
        $comments = [];
        foreach ($recipe->getComments() as $comment){
            $comments[] = $comment->getComment();
        }

        $number = $recipe->getComments()->filter(function(Comments $comment){
        return $comment->getLikes() < 10;
        });

        dump($comments, $number);
        return new Response("adfsg");
    }



    /**
     * @Route("/admin/new", name="newRecipe")
     */
    function newAction(Request $request)
    {
        $title = "Adauga o reteta noua";
        $form = $this->createForm(NewRecipeType::class);
        /*$recipe = new Recipes();
        $form = $this->createFormBuilder($recipe)
            ->add("name", TextType::class, array('label'=>"Nume reteta: "))
            ->add("method", TextareaType::class, array('label'=>"Mod de praparare: "))
            ->add("pieces", IntegerType::class, array('label'=>"Portii: "))
            ->add("preparation_time", IntegerType::class, array('label'=>"Timp de preparare: "))
            ->add("cook_time", IntegerType::class, array('label'=>"Timp de gatire: "))
            ->add("terms", CheckboxType::class, array(
                'label'=>"Am citit si sunt de acord cu termenii si conditiile!",
                'mapped'=>false))
            ->add("save", SubmitType::class, array("label"=>'Adauga'))
            ->add("reset", ResetType::class, array("label"=>'Reset'))
            ->getForm();
        */
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*$name = $form['name']->getData();
            $met = $form['method']->getData();
            $pieces = $form['pieces']->getData();
            $preparation_time = $form['preparation_time']->getData();
            $cook_time = $form['cook_time']->getData();

            $recipe->setName($name);
            $recipe->setMethod($met);
            $recipe->setPieces($pieces);
            $recipe->setRating(0);
            $recipe->setRates(0);
            $recipe->setLikes(0);
            $recipe->setPreparationTime($preparation_time);
            $recipe->setCookTime($cook_time);


            $em = $this->getDoctrine()->getManager();
            $em->persist($recipe);
            $em->flush();
            $this->addFlash("notice", "Todo Added");
            */
            $recipe = $form->getData();
            $recipe->setRating(0);
            $recipe->setRates(0);
            $recipe->setLikes(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($recipe);
            $em->flush();
            $this->addFlash("success", "Felicitari!!! Reteta a fost adaugata cu succes!");

            return $this->redirect("/recipes");
        }

        return $this->render("default/createRecipe.html.twig", array("form" => $form->createView(), "title"=>$title));
    }

    /**
     * @Route("/recipe/edit/{id}", name="editRecipe")
     */
    function editAction(Request $request, Recipes $recipe)
    {
        $title = "Editeaza reteta: ";
        $title .= $recipe->getName();
        $form = $this->createForm(NewRecipeType::class,$recipe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $recipe = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($recipe);
            $em->flush();
            $this->addFlash("success", "Felicitari!!! Reteta a fost editata cu succes!");

            return $this->redirect("/recipes");
        }

        return $this->render("default/createRecipe.html.twig", array("form" => $form->createView(), "title"=>$title));
    }


    /**
     * @Route("/recipes/delete/{id}", name="deleteRecipe")
     */
    public function deleteAction(Recipes $recipe)
    {
        $em = $this->getDoctrine()->getManager();
        $recipeToDelete = $em->getRepository("AppBundle:Recipes")->find($recipe);

        $em->remove($recipeToDelete);
        $em->flush();
        $this->addFlash("success", "Reteta a fost stearsa");

        return $this->redirect("/recipes");

    }


    /**
     * @Route("/picture/{id}")
     */

    public function uploadPicture(Request $request, Recipes $recipe)
    {
        $picture = new RecipePictures();
        $form = $this->createForm( ImageType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $picture->getFileLocation();
            $fileName = $this->get('app.picture_uploader')->uploadFile($file);

            $picture->setFileLocation($fileName);
            $picture->setRecipes($recipe);

            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();
            return new Response("WOW");
        }

        return $this->render('default/newimg.html.twig', array(
            'form' => $form->createView())
        );



    }
}