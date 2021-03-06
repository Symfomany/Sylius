<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Contact\Model;

use PhpSpec\ObjectBehavior;

/**
 * @author Michał Marcinkowski <michal.marcinkowski@lakion.com>
 * @author Gustavo Perdomo <gperdomor@gmail.com>
 */
class TopicSpec extends ObjectBehavior
{
    public function let()
    {
        $this->setCurrentLocale('en_US');
        $this->setFallbackLocale('en_US');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Contact\Model\Topic');
    }

    public function it_implements_Sylius_contact_topic_interface()
    {
        $this->shouldImplement('Sylius\Component\Contact\Model\TopicInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_title_by_default()
    {
        $this->getTitle()->shouldReturn(null);
    }

    public function its_title_is_mutable()
    {
        $this->setTitle('Title');
        $this->getTitle()->shouldReturn('Title');
    }

    public function it_returns_title_when_converted_to_string()
    {
        $this->setTitle('Title');
        $this->__toString()->shouldReturn('Title');
    }

    public function it_has_fluent_interface()
    {
        $this->setTitle('Title')->shouldReturn($this);
    }
}
