<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Shipping\Calculator;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Shipping\Model\ShippingSubjectInterface;
use Symfony\Component\OptionsResolver\OptionsResolver; use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class PerItemRateCalculatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Shipping\Calculator\PerItemRateCalculator');
    }

    public function it_should_implement_Sylius_shipping_calculator_interface()
    {
        $this->shouldImplement('Sylius\Component\Shipping\Calculator\CalculatorInterface');
    }

    public function it_is_configurable()
    {
        $this->shouldBeConfigurable();
    }

    public function it_has_required_amount_configuration_options(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array('amount'))->shouldBeCalled()->willReturn($resolver);
        $resolver->setAllowedTypes(array('amount' => array('numeric')))->shouldBeCalled()->willReturn($resolver);

        $this->setConfiguration($resolver);
    }

    public function it_returns_per_item_rate_configuration_form_type()
    {
        $this->getConfigurationFormType()->shouldReturn('sylius_shipping_calculator_per_item_rate_configuration');
    }

    public function it_should_calculate_the_total_with_the_per_item_amount_configured_on_the_method(
        ShippingSubjectInterface $subject
    ) {
        $subject->getShippingItemCount()->willReturn(11);

        $this->calculate($subject, array('amount' => 200))->shouldReturn(2200);
    }

    public function its_calculated_value_should_be_an_integer(ShippingSubjectInterface $subject)
    {
        $subject->getShippingItemCount()->willReturn(6);

        $this->calculate($subject, array('amount' => 200))->shouldBeInteger();
    }
}
