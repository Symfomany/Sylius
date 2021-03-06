<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\CartBundle\Twig;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\CartBundle\Templating\Helper\CartHelper;
use Symfony\Component\Form\FormView;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class CartExtensionSpec extends ObjectBehavior
{
    public function let(CartHelper $helper)
    {
        $this->beConstructedWith($helper);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\CartBundle\Twig\CartExtension');
    }

    public function it_is_a_twig_extension()
    {
        $this->shouldHaveType('Twig_Extension');
    }

    public function it_has_cart(
        CartHelper $helper
    )
    {
        $helper->hasCart()->shouldBeCalled();
        $this->hasCart();
    }


    public function it_get_item_form_view(
    CartHelper $helper,
    FormView $form
    ){
        $helper->getItemFormView([])->shouldBeCalled();


        $this->getItemFormView([
        ])->shouldReturnAnInstanceOf('Symfony\Component\Form\FormView');
    }

    public function it_get_name(
    ){
        $this->getName()->shouldReturn('sylius_cart');
    }

}
