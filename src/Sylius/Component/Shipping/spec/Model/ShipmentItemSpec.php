<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Shipping\Model;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Shipping\Model\ShipmentInterface;
use Sylius\Component\Shipping\Model\ShippableInterface;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class ShipmentItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Shipping\Model\ShipmentItem');
    }

    public function it_implements_Sylius_shipment_item_interface()
    {
        $this->shouldImplement('Sylius\Component\Shipping\Model\ShipmentItemInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_does_not_belong_to_shipment_by_default()
    {
        $this->getShipment()->shouldReturn(null);
    }

    public function it_allows_assigning_itself_to_shipment(ShipmentInterface $shipment)
    {
        $this->setShipment($shipment);
        $this->getShipment()->shouldReturn($shipment);
    }

    public function it_allows_detaching_itself_from_shipment(ShipmentInterface $shipment)
    {
        $this->setShipment($shipment);
        $this->getShipment()->shouldReturn($shipment);

        $this->setShipment(null);
        $this->getShipment()->shouldReturn(null);
    }

    public function it_has_no_shippable_defined_by_default()
    {
        $this->getShippable()->shouldReturn(null);
    }

    public function it_allows_defining_shippable(ShippableInterface $shippable)
    {
        $this->setShippable($shippable);
        $this->getShippable()->shouldReturn($shippable);
    }

    public function it_has_ready_state_by_default()
    {
        $this->getShippingState()->shouldReturn(ShipmentInterface::STATE_READY);
    }

    public function its_state_is_mutable()
    {
        $this->setShippingState(ShipmentInterface::STATE_SHIPPED);
        $this->getShippingState()->shouldReturn(ShipmentInterface::STATE_SHIPPED);
    }

    public function it_initializes_creation_date_by_default()
    {
        $this->getCreatedAt()->shouldHaveType('DateTime');
    }

    public function its_creation_date_is_mutable()
    {
        $date = new \DateTime();

        $this->setCreatedAt($date);
        $this->getCreatedAt()->shouldReturn($date);
    }

    public function it_has_no_last_update_date_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    public function its_last_update_date_is_mutable()
    {
        $date = new \DateTime();

        $this->setUpdatedAt($date);
        $this->getUpdatedAt()->shouldReturn($date);
    }
}
