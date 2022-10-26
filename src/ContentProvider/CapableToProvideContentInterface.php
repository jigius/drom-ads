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

namespace Jigius\DromOffers\ContentProvider;

interface CapableToProvideContentInterface
{
    /**
     * Defines Request instance that going to be used for the fetching of a some resource
     * @param RequestInterface $r
     * @return CapableToProvideContentInterface
     */
    public function withRequest(RequestInterface $r): CapableToProvideContentInterface;
    
    /**
     * Fetches a some resource with using of Request instance defined early
     * @param ResponseInterface $r
     * @return ResponseInterface
     */
    public function fetched(ResponseInterface $r): ResponseInterface;
}
