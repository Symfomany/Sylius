<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\CartBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class CartTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Cart', array('sylius'));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\CartBundle\Form\Type\CartType');
    }

    public function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    public function it_builds_form_with_items_collection(FormBuilder $builder)
    {
        $builder
            ->add('items', 'collection', array('type' => 'sylius_cart_item'))
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    public function it_defines_assigned_data_class(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => 'Cart',
                'validation_groups' => array('sylius'),
            ))
            ->shouldBeCalled()
        ;

        $this->setDefaultOptions($resolver);
    }
}
