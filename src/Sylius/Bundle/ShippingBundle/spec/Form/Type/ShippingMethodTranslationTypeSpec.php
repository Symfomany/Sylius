<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\ShippingBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
class ShippingMethodTranslationTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('ShippingMethodTranslation', array('sylius'));
    }

    public function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    public function it_builds_form_with_proper_fields(FormBuilder $builder)
    {
        $builder->addEventSubscriber(Argument::any())->willReturn($builder);
        $builder
            ->add('name', 'text', Argument::any())
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    public function it_defines_assigned_data_class(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => 'ShippingMethodTranslation',
                'validation_groups' => array('sylius'),
            ))
            ->shouldBeCalled()
        ;

        $this->setDefaultOptions($resolver);
    }
}
