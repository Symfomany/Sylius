<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\Form\Type\Checkout;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Checkout shipping step form type.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class ShippingStepType extends AbstractResourceType
{
    /**
     * @var ChannelContextInterface
     */
    protected $channelContext;

    /**
     * @param string                  $dataClass
     * @param array                   $validationGroups
     * @param ChannelContextInterface $channelContext
     */
    public function __construct($dataClass, array $validationGroups = array(), ChannelContextInterface $channelContext)
    {
        parent::__construct($dataClass, $validationGroups);
        $this->channelContext = $channelContext;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shipments', 'collection', array(
                'type' => 'sylius_checkout_shipment',
                'options' => array('criteria' => $options['criteria'], 'channel' => $this->channelContext->getChannel()),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefined(array(
                'criteria',
            ))
            ->setAllowedTypes(
                'criteria', array('array')
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_checkout_shipping';
    }
}
