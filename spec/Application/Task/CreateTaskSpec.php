<?php

namespace spec\Application\Task;

use Application\Task\CreateTask;
use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;
use Infrastructure\Persistence\File\Task\TaskRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateTaskSpec extends ObjectBehavior
{
    private $name = 'Name';

    function let()
    {
        $repository = new TaskRepository();
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateTask::class);
    }

    function it_can_create_task()
    {
        $this->createTask('Name');



    }

}
