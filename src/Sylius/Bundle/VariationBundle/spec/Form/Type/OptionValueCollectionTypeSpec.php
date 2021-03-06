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
use Sylius\Component\Product\Model\OptionInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionValueCollectionTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('varibale_name');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\VariationBundle\Form\Type\OptionValueCollectionType');
    }

    public function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    public function it_builds_a_form(FormBuilderInterface $builder, OptionInterface $option)
    {
        $option->getId()->shouldBeCalled()->willReturn(3);
        $option->getName()->shouldBeCalled()->willReturn('option_name');

        $builder->add('3', 'sylius_varibale_name_option_value_choice', array(
            'label' => 'option_name',
            'option' => $option,
            'property_path' => '[0]',
        ))->shouldBeCalled();

        $this->buildForm($builder, array(
            'options' => array($option),
        ));
    }

    public function it_has_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'options' => null,
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('sylius_varibale_name_option_value_collection');
    }
}
