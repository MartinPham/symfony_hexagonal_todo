<?php

namespace spec\Infrastructure\Persistence\File\Task;

use Domain\Task;
use Infrastructure\Persistence\File\Task\TaskRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskRepositorySpec extends ObjectBehavior
{
    protected $task;

    function let()
    {
        $this->beConstructedWith();
        $this->task = new Task('Name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TaskRepository::class);
    }

    function it_can_create_and_delete_task()
    {
        $this->save($this->task);
        $this->remove($this->task);
    }
    function it_can_find_all()
    {
        $this->findAll();
    }

}
