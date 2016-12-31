<?php

namespace spec\Application\Task;

use Application\Task\DeleteTask;
use Domain\Repository\Exception\TaskNotFoundException;
use Domain\Task;
use Infrastructure\Persistence\File\Task\TaskRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteTaskSpec extends ObjectBehavior
{
    function let()
    {
        $repository = new TaskRepository();
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteTask::class);
    }

    function it_can_delete_task()
    {
        $this->shouldThrow(TaskNotFoundException::class)->during('deleteTask', ['1']);
    }
}
