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

use Jigius\DromOffers\ContentProvider as CP;
use Jigius\DromOffers\Entity\EntityInterface;

interface PageInterface extends EntityInterface
{
    /**
     * @inheritDoc
     */
    public function withResponse(CP\ResponseInterface $r): PageInterface;
    
    /**
     * @inheritDoc
     */
    public function withRequest(CP\RequestInterface $r): PageInterface;
    
    /**
     * Limits the total quantity of processed ads to a defined. Zero - no limits
     * @param int $n
     * @return PageInterface
     */
    public function withLimit(int $n = 0): PageInterface;
    
    /**
     * Defines a quantity of ads to miss in time of the processing
     * @param int $n
     * @return PageInterface
     */
    public function withOffset(int $n = 0): PageInterface;
}
