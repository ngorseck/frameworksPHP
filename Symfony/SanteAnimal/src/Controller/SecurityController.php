<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="login")
     */
    public function index()
    {
        return $this->redirectToRoute('app_login');
    }
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
            //return $this->render('base.html.twig');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        if($error != null)
        {
            $error = "Email ou mot de passe incorrect";
        }
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
    /**
     * @Route("/register", name="app_register")
     */
    public function register(UserPasswordEncoderInterface $encoder)
    {
        // whatever *your* User object is
        if (isset($_POST['envoyer']))
        {
            $user = new User();
            $plainPassword = $_POST['password'];
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPassword($encoded);
            $user->setEmail($_POST['email']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('security/register.html.twig');
    }
    /**
     * @Route("/accueil", name="homepage")
     */
    public function accueil()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/admin", name="app_admin")
     */
    public function admin()
    {
        return $this->render('base.html.twig');
    }
}
