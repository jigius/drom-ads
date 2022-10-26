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
use Iterator;

/**
 * Contract is used for initializing a request with a value that defines a reference to the next page
 */
interface RefsToAdInterface
{
    /**
     * Defines a response with a content that has been gotten on a request
     * @param Cp\ResponseInterface $r
     * @return RefsToAdInterface
     */
    public function withResponse(Cp\ResponseInterface $r): RefsToAdInterface;
    
    /**
     * Defines Request instance that will be used for values are returned by the iterator
     * @param RequestInterface $r
     * @return RefsToAdInterface
     */
    public function withRequest(Cp\RequestInterface $r): RefsToAdInterface;
    
    /**
     * Process the extracting values
     * @return RefsToAdInterface
     */
    public function extracted(): RefsToAdInterface;
    
    /**
     * Signs if the set of extracted values is empty or not
     * @return bool
     */
    public function emptied(): bool;
    
    /**
     * Returns set of extracted values with using of a iterator
     * @return Iterator
     */
    public function iterator(): Iterator;
}
