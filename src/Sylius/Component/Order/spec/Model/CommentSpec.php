<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Order\Model;

use PhpSpec\ObjectBehavior;

/**
 * @author Myke Hines <myke@webhines.com>
 */
class CommentSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Order\Model\Comment');
    }

    public function it_implements_Sylius_comment_interface()
    {
        $this->shouldImplement('Sylius\Component\Order\Model\CommentInterface');
    }

    public function it_implements_Sylius_timestampable_interface()
    {
        $this->shouldImplement('Sylius\Component\Resource\Model\TimestampableInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_order_by_default()
    {
        $this->getOrder()->shouldReturn(null);
    }

    public function it_has_no_state_by_default()
    {
        $this->getState()->shouldReturn(null);
    }

    public function its_comment_is_mutable()
    {
        $this->setComment('001351');
        $this->getComment()->shouldReturn('001351');
    }
}
