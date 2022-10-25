<?php
/*
 * This file is part of the jigius/drom-ads project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 *
 * @copyright Copyright (c) 2022 Jigius <jigius@gmail.com>
 * @link https://github.com/jigius/drom-ads GitHub
 */

namespace Jigius\DromOffers\Entity\Ad;

interface OfferInterface
{
    /**
     * @return ResultInterface
     */
    public function processed(): ResultInterface;
}
