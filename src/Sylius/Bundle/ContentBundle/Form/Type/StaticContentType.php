<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ContentBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Simple static content type.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class StaticContentType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = array())
    {
        $builder
            ->add('publishable', null, array(
                'label' => 'sylius.form.static_content.publishable',
            ))
            ->add('id', 'text', array(
                'label' => 'sylius.form.static_content.id',
            ))
            ->add('parent', null, array(
                'label' => 'sylius.form.static_content.parent',
            ))
            ->add('name', 'text', array(
                'label' => 'sylius.form.static_content.internal_name',
            ))
            ->add('locale', 'text', array(
                'label' => 'sylius.form.static_content.title',
            ))
            ->add('title', 'text', array(
                'label' => 'sylius.form.static_content.title',
            ))
            ->add('routes', 'collection', array(
                'type' => 'sylius_route',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'sylius.form.static_content.routes',
             ))
            ->add('menuNodes', 'collection', array(
                'type' => 'sylius_menu_node',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'sylius.form.static_content.menu_nodes',
             ))
            ->add('body', 'textarea', array(
                'required' => false,
                'label' => 'sylius.form.static_content.body',
            ))
            ->add('publishStartDate', 'datetime', array(
                'label' => 'sylius.form.static_content.publish_start_date',
                'empty_value' => /* @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-'),
                'time_widget' => 'text',
            ))
            ->add('publishEndDate', 'datetime', array(
                'label' => 'sylius.form.static_content.publish_end_date',
                'empty_value' => /* @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-'),
                'time_widget' => 'text',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_static_content';
    }
}
