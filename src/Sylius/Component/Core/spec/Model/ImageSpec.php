<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Core\Model;

use PhpSpec\ObjectBehavior;

class ImageSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Core\Model\Image');
    }

    public function it_implements_Sylius_image_interface()
    {
        $this->shouldImplement('Sylius\Component\Core\Model\ImageInterface');
    }

    public function it_does_not_have_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_does_not_have_file_by_default()
    {
        $this->hasFile()->shouldReturn(false);
        $this->getFile()->shouldReturn(null);
    }

    public function its_file_is_mutable()
    {
        $file = new \SplFileInfo(__FILE__);
        $this->setFile($file);
        $this->getFile()->shouldReturn($file);
    }

    public function its_path_is_mutable()
    {
        $path = __FILE__;
        $this->setPath($path);
        $this->getPath()->shouldReturn($path);
    }

    public function it_initializes_creation_date_by_default()
    {
        $this->getCreatedAt()->shouldHaveType('DateTime');
    }

    public function it_does_not_have_last_update_date_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }
}
