<?php

namespace spec\Application\Task;

use Application\Task\ListTask;
use Domain\Repository\TaskRepositoryInterface;
use Infrastructure\Persistence\File\Task\TaskRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ListTaskSpec extends ObjectBehavior
{
    function let()
    {
        $repository = new TaskRepository();
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ListTask::class);
    }

    function it_can_get_list_task()
    {
        $this->getAllTasks()->shouldBeArray();
    }
}
