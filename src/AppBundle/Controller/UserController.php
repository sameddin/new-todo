<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/user/{id}", name="user_profile", requirements={"id": "\d+"})
     *
     * @param User $user
     * @return array
     */
    public function profileAction(User $user)
    {
        return $this->render('user_profile.html.twig', [
            'user' => $user,
        ]);
    }
}
