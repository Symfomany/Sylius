<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\FlowBundle\Storage;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\FlowBundle\Storage\SessionFlowsBag;

class SessionFlowsBagSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\FlowBundle\Storage\SessionFlowsBag');
    }

    public function it_is_a_namespace_attribute_bag()
    {
        $this->shouldHaveType('Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag');
    }

    public function it_has_a_name()
    {
        $this->getName()->shouldReturn(SessionFlowsBag::NAME);
    }
}
