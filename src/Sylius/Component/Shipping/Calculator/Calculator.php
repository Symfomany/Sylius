<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Component\Shipping\Calculator;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Base calculator.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
abstract class Calculator implements CalculatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function isConfigurable()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        // Nothing to do here...
    }

    /**
     * {@inheritdoc}
     */
    public function setConfiguration(OptionsResolver $resolver)
    {
        // Nothing to do here...
    }
}
