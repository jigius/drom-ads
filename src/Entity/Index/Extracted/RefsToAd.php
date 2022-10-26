<?php

namespace Jigius\DromOffers\Entity\Index\Extracted;

use Iterator;
use Jigius\DromOffers\ContentProvider as Cp;

final class RefsToAd implements RefsToAdInterface
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
    
    public function extracted(): RefsToAdInterface
    {
        // TODO: Implement extracted() method.
    }
    
    public function withResponse(Cp\ResponseInterface $r): RefsToAdInterface
    {
        // TODO: Implement withResponse() method.
    }
    
    public function withRequest(Cp\RequestInterface $r): RefsToAdInterface
    {
        // TODO: Implement withRequest() method.
    }
    
    public function emptied(): bool
    {
        // TODO: Implement emptied() method.
    }
    
    public function iterator(): Iterator
    {
        // TODO: Implement iterator() method.
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
