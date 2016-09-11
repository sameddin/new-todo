<?php
namespace AppBundle\Controller;

use AppBundle\Entity\TodoList;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExampleController extends Controller
{
    /**
     * @Route("/example/index", name="example")
     */
    public function indexAction()
    {
        $tasks = $this->getDoctrine()
            ->getRepository('AppBundle:TodoList')
            ->findAll();

        return $this->render('example.html.twig', [
            'tasks' => $tasks,
        ]);
    }
}
