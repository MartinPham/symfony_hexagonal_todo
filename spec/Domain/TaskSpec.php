<?php

namespace spec\Domain;

use Domain\Task;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskSpec extends ObjectBehavior
{
    private $name = 'Name';

    function let(){
        $this->beConstructedWith($this->name);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Task::class);
    }

    function it_can_get_id()
    {
        $this->getId();
    }

    function it_can_set_id()
    {
        $this->setId(100)->shouldBeAnInstanceOf(Task::class);
        $this->getId()->shouldEqual(100);
    }

    function it_can_get_name()
    {
        $this->getName()->shouldBeString();
        $this->getName()->shouldEqual($this->name);
    }

    function it_can_set_name()
    {
        $this->setName($this->name . $this->name)->shouldBeAnInstanceOf(Task::class);
        $this->getName()->shouldEqual($this->name . $this->name);
    }



}
