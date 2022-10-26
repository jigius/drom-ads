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

namespace Jigius\DromOffers\Entity;

use Jigius\DromOffers\ContentProvider as CP;

interface EntityInterface
{
    /**
     * @param CP\ResponseInterface $r
     * @return EntityInterface
     */
    public function withResponse(CP\ResponseInterface $r): EntityInterface;
    
    /**
     * Defines an instance of Request for using with ContentProvider
     * @param CP\RequestInterface $r
     * @return EntityInterface
     */
    public function withRequest(CP\RequestInterface $r): EntityInterface;
    
    /**
     * Processes ads those have been placed in the requested index page
     * @return ResultInterface
     */
    public function processed(ResultInterface $r): ResultInterface;
}
