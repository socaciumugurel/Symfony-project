<?php

namespace UserBundle\Controller;

use AppBundle\Form\LoginType;
use AppBundle\Form\UserRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\User;

class DefaultController extends Controller
{


    public function displayAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $user = $this->getUser();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'zzz'=> $user
        ));
    }

    public function logoutAction()
    {

    }

    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserRegistrationForm::class, $user);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
           $password = $this->get('security.password_encoder')
               ->encodePassword($user, $user->getPlainPassword());
           $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Welcome ');
            return $this->redirectToRoute('home');

        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
