<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Promotion\Model;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Promotion\Model\ActionInterface;
use Sylius\Component\Promotion\Model\CouponInterface;
use Sylius\Component\Promotion\Model\RuleInterface;

/**
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class PromotionSpec extends ObjectBehavior
{
    public function it_should_be_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Promotion\Model\Promotion');
    }

    public function it_should_be_Sylius_promotion()
    {
        $this->shouldImplement('Sylius\Component\Promotion\Model\PromotionInterface');
    }

    public function it_should_not_have_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function its_name_should_be_mutable()
    {
        $this->setName('New Year Sale');
        $this->getName()->shouldReturn('New Year Sale');
    }

    public function its_description_should_be_mutable()
    {
        $this->setDescription('New Year Sale 50% off.');
        $this->getDescription()->shouldReturn('New Year Sale 50% off.');
    }

    public function its_priority_should_be_mutable()
    {
        $this->setPriority(5);
        $this->getPriority()->shouldReturn(5);
    }

    public function its_not_exclusive_by_default()
    {
        $this->isExclusive()->shouldReturn(false);
    }

    public function its_exclusive_should_be_mutable()
    {
        $this->setExclusive(true);
        $this->isExclusive()->shouldReturn(true);
    }

    public function it_should_have_no_usage_limit_by_default()
    {
        $this->getUsageLimit()->shouldReturn(null);
    }

    public function its_usage_limit_should_be_mutable()
    {
        $this->setUsageLimit(10);
        $this->getUsageLimit()->shouldReturn(10);
    }

    public function it_should_not_be_used_by_default()
    {
        $this->getUsed()->shouldReturn(0);
    }

    public function its_used_should_be_mutable()
    {
        $this->setUsed(5);
        $this->getUsed()->shouldReturn(5);
    }

    public function its_used_should_be_incrementable()
    {
        $this->incrementUsed();
        $this->getUsed()->shouldReturn(1);
    }

    public function its_starts_at_should_be_mutable(\DateTime $date)
    {
        $this->setStartsAt($date);
        $this->getStartsAt()->shouldReturn($date);
    }

    public function its_ends_at_should_be_mutable(\DateTime $date)
    {
        $this->setEndsAt($date);
        $this->getEndsAt()->shouldReturn($date);
    }

    public function it_should_initialize_coupons_collection_by_default()
    {
        $this->getCoupons()->shouldHaveType('Doctrine\Common\Collections\Collection');
    }

    public function it_should_add_coupons_properly(CouponInterface $coupon)
    {
        $this->hasCoupon($coupon)->shouldReturn(false);

        $coupon->setPromotion($this)->shouldBeCalled();
        $this->addCoupon($coupon);

        $this->hasCoupon($coupon)->shouldReturn(true);
    }

    public function it_should_remove_coupons_properly(CouponInterface $coupon)
    {
        $this->hasCoupon($coupon)->shouldReturn(false);

        $coupon->setPromotion($this)->shouldBeCalled();
        $this->addCoupon($coupon);

        $coupon->setPromotion(null)->shouldBeCalled();
        $this->removeCoupon($coupon);

        $this->hasCoupon($coupon)->shouldReturn(false);
    }

    public function it_should_initialize_rules_collection_by_default()
    {
        $this->getRules()->shouldHaveType('Doctrine\Common\Collections\Collection');
    }

    public function it_should_add_rules_properly(RuleInterface $rule)
    {
        $this->hasRule($rule)->shouldReturn(false);

        $rule->setPromotion($this)->shouldBeCalled();
        $this->addRule($rule);

        $this->hasRule($rule)->shouldReturn(true);
    }

    public function it_should_remove_rules_properly(RuleInterface $rule)
    {
        $this->hasRule($rule)->shouldReturn(false);

        $rule->setPromotion($this)->shouldBeCalled();
        $this->addRule($rule);

        $rule->setPromotion(null)->shouldBeCalled();
        $this->removeRule($rule);

        $this->hasRule($rule)->shouldReturn(false);
    }

    public function it_should_initialize_actions_collection_by_default()
    {
        $this->getActions()->shouldHaveType('Doctrine\Common\Collections\Collection');
    }

    public function it_should_add_actions_properly(ActionInterface $action)
    {
        $this->hasAction($action)->shouldReturn(false);

        $action->setPromotion($this)->shouldBeCalled();
        $this->addAction($action);

        $this->hasAction($action)->shouldReturn(true);
    }

    public function it_should_remove_actions_properly(ActionInterface $action)
    {
        $this->hasAction($action)->shouldReturn(false);

        $action->setPromotion($this)->shouldBeCalled();
        $this->addAction($action);

        $action->setPromotion(null)->shouldBeCalled();
        $this->removeAction($action);

        $this->hasAction($action)->shouldReturn(false);
    }
}
