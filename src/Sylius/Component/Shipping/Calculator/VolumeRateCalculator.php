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

use Sylius\Component\Shipping\Model\ShippingSubjectInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Per weight amount rate calculator.
 *
 * @author Antonio Peric <antonio@locastic.com>
 */
class VolumeRateCalculator extends Calculator
{
    /**
     * {@inheritdoc}
     */
    public function calculate(ShippingSubjectInterface $subject, array $configuration)
    {
        return (int) round($configuration['amount'] * ($subject->getShippingVolume() / $configuration['division']));
    }

    /**
     * {@inheritdoc}
     */
    public function isConfigurable()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        return 'sylius_shipping_calculator_volume_rate_configuration';
    }

    /**
     * {@inheritdoc}
     */
    public function setConfiguration(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'division' => 1,
            ))
            ->setRequired(array(
                'amount',
                'division',
            ))
            ->setAllowedTypes(
                'amount', array('numeric')
            )
            ->setAllowedTypes(
                'division', array('numeric')
            )
        ;
    }
}
