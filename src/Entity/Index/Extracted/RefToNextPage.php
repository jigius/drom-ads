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
use InvalidArgumentException;
use LogicException;

final class RefToNextPage implements RefToNextPageInterface
{
    /**
     * @var array
     */
    private array $i;
    
    /**
     * Cntr
     */
    public function __construct()
    {
        $this->i = [];
    }
    
    /**
     * @inheritDoc
     */
    public function withResponse(Cp\ResponseInterface $r): RefToNextPageInterface
    {
        $that = $this->blueprinted();
        $that->i['resp'] = $r;
        return $that;
    }
    
    /**
     * @inheritDoc
     */
    public function defined(): bool
    {
        return isset($that->i['value']);
    }
    
    /**
     * @return RefToNextPageInterface
     * @throws InvalidArgumentException
     */
    public function extracted(): RefToNextPageInterface
    {
        if (!isset($this->i['resp'])) {
            throw new InvalidArgumentException("`response is not defined`");
        }
        $that = $this->blueprinted();
        // FIXME !!!
        $that->i['value'] = "https://foobar.example.com";
        return $that;
    }
    
    /**
     * @inheritDoc
     * @throws LogicException
     */
    public function request(Cp\RequestInterface $r): CP\RequestInterface
    {
        if ($this->defined()) {
            throw new LogicException("value is not defined");
        }
        // FIXME!!!
        return $r->withUrl($this->i['value']);
    }
    
    /**
     * Clones the instance
     * @return $this
     */
    public function blueprinted(): self
    {
        $that = new self();
        $that->i = $this->i;
        return $that;
    }
}
