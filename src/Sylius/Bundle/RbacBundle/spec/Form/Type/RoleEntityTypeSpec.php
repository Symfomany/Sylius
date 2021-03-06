<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\RbacBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Arnaud Langlade <arn0d.dev@gmail.com>
 */
class RoleEntityTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Role', SyliusResourceBundle::DRIVER_DOCTRINE_ORM, 'name');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\RbacBundle\Form\Type\RoleEntityType');
    }

    public function it_is_a_form()
    {
        $this->shouldHaveType('Sylius\Bundle\ResourceBundle\Form\Type\ResourceChoiceType');
    }

    public function it_has_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults(Argument::withKey('class'))->shouldBeCalled()->willReturn($resolver);
        $resolver->setNormalizers(Argument::withKey('class'))->shouldBeCalled()->willReturn($resolver);
        $resolver->setDefaults(Argument::withKey('query_builder'))->shouldBeCalled()->willReturn($resolver);

        $this->setDefaultOptions($resolver);
    }
}
