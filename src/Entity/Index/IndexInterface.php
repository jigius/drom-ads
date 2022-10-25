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

namespace Jigius\DromOffers\Entity\Index;

interface IndexInterface
{
    /**
     * Processes ads those have been placed in the requested index page
     * @param int $limit
     * @param int $offset
     * @return ResultInterface
     */
    public function processed(int $limit = 1, int $offset = 0): ResultInterface;
    
    public function withRequest()
}
