<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\FlowBundle\DependencyInjection\Compiler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class RegisterStepsPassSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\FlowBundle\DependencyInjection\Compiler\RegisterStepsPass');
    }

    public function it_is_compiler_pass()
    {
        $this->shouldImplement('Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface');
    }

    public function it_processes(ContainerBuilder $container, Definition $coordinator)
    {
        $container->getDefinition('sylius.process.builder')->shouldBeCalled()->willreturn($coordinator);
        $container->findTaggedServiceIds('sylius.process.step')->shouldBeCalled()->willreturn(array(
            'id' => array(
                array(
                    'alias' => 'alias',
                ),
            ),
        ));

        $coordinator->addMethodCall('registerStep', Argument::type('array'))->shouldBeCalled();

        $this->process($container);
    }
}
