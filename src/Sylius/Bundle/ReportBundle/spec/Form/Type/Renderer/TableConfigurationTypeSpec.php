<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\ReportBundle\Form\Type\Renderer;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\FormBuilder;
use Prophecy\Argument;

/**
 * @author Mateusz Zalewski <mateusz.zalewski@lakion.com>
 */
class TableConfigurationTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\ReportBundle\Form\Type\Renderer\TableConfigurationType');
    }

    public function it_should_be_abstract_type_object()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_has_name()
    {
        $this->getName()->shouldReturn('sylius_renderer_table');
    }

    public function it_builds_form_with_template_choice(FormBuilder $builder)
    {
        $builder->add('template', 'choice', Argument::any())->willReturn($builder);

        $this->buildForm($builder, array());
    }
}
