<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\PromotionBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Promotion\Model\RuleInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class RuleChoiceTypeSpec extends ObjectBehavior
{
    private $choices = array(
        RuleInterface::TYPE_ITEM_TOTAL => 'Order total',
        RuleInterface::TYPE_ITEM_COUNT => 'Order items count',
    );

    public function let()
    {
        $this->beConstructedWith($this->choices);
    }

    public function it_should_be_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\PromotionBundle\Form\Type\RuleChoiceType');
    }

    public function it_should_be_a_form_type()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_should_set_rule_types_to_choose_from(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('choices' => $this->choices))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }
}
