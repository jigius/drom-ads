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

namespace Jigius\DromOffers\Entity\Index\Extracted;

use Jigius\DromOffers\ContentProvider as Cp;
use Jigius\DromOffers\ContentProvider\RequestInterface;

/**
 * Contract is used for initializing a request with a value that defines a reference to the next page
 */
interface RefToNextPageInterface
{
    /**
     * Defines a response with a requests content
     * @param Cp\ResponseInterface $r
     * @return RefToNextPageInterface
     */
    public function withResponse(Cp\ResponseInterface $r): RefToNextPageInterface;
    
    /**
     * Process the extracting value
     * @return RefToNextPageInterface
     */
    public function extracted(): RefToNextPageInterface;
    
    /**
     * Signs if a value has been extracted successfully or not
     * @return bool
     */
    public function defined(): bool;
    
    /**
     * Initializes a specified request with using of an extracted value
     * @param RequestInterface $r
     * @return RequestInterface
     */
    public function request(CP\RequestInterface $r): CP\RequestInterface;
}
