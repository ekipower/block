<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SimpleBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ReceiveInfo
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length( min = 1, max = 255, maxMessage = "feedback.max_size.255" )
     * @Assert\Email
     */
    public $email;
}
