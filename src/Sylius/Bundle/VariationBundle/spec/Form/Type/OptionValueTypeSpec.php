<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\VariationBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class OptionValueTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('OptionValue', array(), 'server');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\VariationBundle\Form\Type\OptionValueType');
    }

    public function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    public function it_builds_form_with_value_field(FormBuilder $builder)
    {
        $builder
            ->add('value', 'text', Argument::any())
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    public function it_defines_assigned_data_class_and_validation_groups(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => 'OptionValue',
                'validation_groups' => array(),
            ))
            ->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_has_valid_name()
    {
        $this->getName()->shouldReturn('sylius_server_option_value');
    }
}
