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
 * Defines the contract for result instance for fetching of some resource via HTTP-protocol
 */
interface ResponseInterface
{
    /**
     * Returns a resource with a result
     * @return resource
     */
    public function resource();
    
    /**
     * Return a result as string
     * @return string
     */
    public function content(): string;
    
    /**
     * Returns all gotten headers
     * @return array
     */
    public function headers(): array;
    
    /**
     * Returns a value(s) for a specified header
     * @param string $name
     * @return string|array[string]
     */
    public function header(string $name);
    
    /**
     * Signs if a specified header exists
     * @param string $name
     * @return bool
     */
    public function hasHeader(string $name): bool;
}
