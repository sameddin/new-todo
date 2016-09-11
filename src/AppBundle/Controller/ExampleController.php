<?php
namespace AppBundle\Controller;

use AppBundle\Entity\TodoList;
use AppBundle\Form\Type\TodoListAddType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

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

        $task = new TodoList();
        $form = $this->createForm(TodoListAddType::class, $task, [
            'action' => $this->generateUrl('task.add'),
            'method' => 'POST',
        ]);

        return $this->render('example.html.twig', [
            'tasks' => $tasks,
            'form'  => $form->createView(),
        ]);
    }

    /**
     * @Route("/example/add", name="task.add")
     * @param Request $request
     * @return RedirectResponse
     */
    public function addAction(Request $request)
    {
        $task = new TodoList();
        $form = $this->createForm(TodoListAddType::class, $task);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        return $this->redirectToRoute('example');
    }
}