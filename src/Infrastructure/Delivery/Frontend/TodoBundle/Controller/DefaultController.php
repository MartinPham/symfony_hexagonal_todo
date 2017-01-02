<?php

namespace Infrastructure\Delivery\Frontend\TodoBundle\Controller;

use Application\Task\TaskService;
use Infrastructure\Delivery\Frontend\TodoBundle\Entity\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class DefaultController
 *
 * @Route(service="task.frontend.default")
 *
 * @category None
 * @package  Infrastructure\Delivery\Frontend\TodoBundle\Controller
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class DefaultController extends Controller
{
    /**
     * Router
     *
     * @var RouterIntace
     */
    protected $router;

    /**
     * Form Factory
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * Task service
     *
     * @var TaskService
     */
    protected $taskService;

    /**
     * DefaultController constructor
     *
     * @param RouterIntace         $router      Router
     * @param FormFactoryInterface $formFactory Form factory
     * @param TaskService          $taskService Task service
     *
     * @return void
     */
    public function __construct(
        RouterInterface $router,
        FormFactoryInterface $formFactory,
        TaskService $taskService
    ) {
        $this->router = $router;
        $this->formFactory = $formFactory;
        $this->taskService = $taskService;
    }

    /**
     * Index page
     *
     * @param Request $request Request
     *
     * @Route("/", name="index")
     * @Template()
     *
     * @return mixed
     */
    public function indexAction(Request $request)
    {
        $taskTypeForm = $this->formFactory->create(TaskType::class);

        $taskTypeForm->handleRequest($request);

        if ($taskTypeForm->isSubmitted() && $taskTypeForm->isValid()) {
            $data = $taskTypeForm->getData();

            $this->taskService->createTask($data['name']);

            return new RedirectResponse($this->router->generate('index'));
        }

        return [
            'tasks' => $this->taskService->getAllTasks(),
            'task_form' => $taskTypeForm->createView()
        ];
    }

    /**
     * Delete page
     *
     * @param string $id Id of task
     *
     * @Route("/delete/{id}", name="delete")
     *
     * @return mixed
     */
    public function deleteAction(string $id)
    {
        $this->taskService->deleteTask($id);

        return new RedirectResponse($this->router->generate('index'));
    }
}
