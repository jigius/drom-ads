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

/**
 * Defines the contract is used for fetching of some document via HTTP-protocol
 */
interface RequestInterface
{
    /**
     * Defines a hostname (with scheme! f.e. - https://example.com)
     * @param string $h
     * @return RequestInterface
     */
    function withHostname(string $h): RequestInterface;
    
    /**
     * Defines a URL
     * @param string $url
     * @return RequestInterface
     */
    function withUrl(string $url): RequestInterface;
    
    /**
     * Defines a path
     * @param string $path
     * @return RequestInterface
     */
    function withPath(string $path): RequestInterface;
    
    /**
     * Defines GET-parameters
     * @param array $params
     * @return RequestInterface
     */
    function withQuery(array $params): RequestInterface;
    
    /**
     * Resets the state of instance to the initial empty state
     * @return RequestInterface
     */
    function emptied(): RequestInterface;
}
