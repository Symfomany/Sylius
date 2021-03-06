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
use Sylius\Component\Shipping\Calculator\Registry\CalculatorRegistryInterface;
use Sylius\Component\Shipping\Resolver\MethodsResolverInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Arnaud Langlade <arn0d.dev@gamil.com>
 */
class ShippingMethodChoiceTypeSpec extends ObjectBehavior
{
    public function let(
        MethodsResolverInterface $resolver,
        CalculatorRegistryInterface $calculators,
        RepositoryInterface $repository
    ) {
        $this->beConstructedWith($resolver, $calculators, $repository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\ShippingBundle\Form\Type\ShippingMethodChoiceType');
    }

    public function it_is_a_form()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_builds_a_form(FormBuilderInterface $builder)
    {
        $builder->addModelTransformer(
            Argument::type('Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer')
        )->shouldBeCalled();

        $this->buildForm($builder, array(
            'multiple' => true,
        ));
    }

    public function it_has_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults(Argument::withKey('choice_list'))->shouldBeCalled()->willReturn($resolver);
        $resolver->setDefined(array(
            'subject',
        ))->shouldBeCalled()->willReturn($resolver);
        $resolver->setAllowedTypes(array(
            'subject' => array('Sylius\Component\Shipping\Model\ShippingSubjectInterface'),
            'criteria' => array('array'),
        ))->shouldBeCalled()->willReturn($resolver);

        $this->setDefaultOptions($resolver);
    }

    public function it_has_a_parent()
    {
        $this->getParent()->shouldReturn('choice');
    }

    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('sylius_shipping_method_choice');
    }
}
