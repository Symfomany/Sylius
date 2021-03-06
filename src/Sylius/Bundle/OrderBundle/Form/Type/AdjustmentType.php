<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\OrderBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Adjustment form type.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class AdjustmentType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', 'text', array(
                'label' => 'sylius.form.adjustment.label',
            ))
            ->add('description', 'text', array(
                'label' => 'sylius.form.adjustment.description',
                'required' => false,
            ))
            ->add('amount', 'sylius_money', array(
                'label' => 'sylius.form.adjustment.amount',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_adjustment';
    }
}
