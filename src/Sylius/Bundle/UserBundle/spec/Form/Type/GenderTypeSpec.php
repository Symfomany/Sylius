<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\UserBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Sylius\Component\User\Model\CustomerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenderTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\UserBundle\Form\Type\GenderType');
    }

    public function it_is_a_form()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_has_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                CustomerInterface::UNKNOWN_GENDER => ' ',
                CustomerInterface::MALE_GENDER => 'sylius.gender.male',
                CustomerInterface::FEMALE_GENDER => 'sylius.gender.female',
            ),
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('sylius_gender');
    }

    public function it_has_a_parent()
    {
        $this->getParent()->shouldReturn('choice');
    }
}
