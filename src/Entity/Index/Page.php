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

use InvalidArgumentException;
use Jigius\DromOffers\ContentProvider as CP;
use Jigius\DromOffers\ContentProvider\CapableToProvideContentInterface;
use Jigius\DromOffers\Entity;

final class Page implements PageInterface
{
    /**
     * @var array
     */
    private array $i;

    /**
     * @var Entity\EntityInterface
     */
    private Entity\EntityInterface $ad;
    /**
     * @var CapableToProvideContentInterface
     */
    private CapableToProvideContentInterface $prvdr;
    
    /**
     * Cntr
     * @param CapableToProvideContentInterface $prvdr
     * @param Entity\EntityInterface $ad
     */
    public function __construct(CapableToProvideContentInterface $prvdr, Entity\EntityInterface $ad) {
        $this->prvdr = $prvdr;
        $this->ad = $ad;
        $this->i = [
            'offset' => 0,
            'limit' => 0
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function withResponse(CP\ResponseInterface $r): self
    {
        $that = $this->blueprinted();
        $that->i['resp'] = $r;
        return $that;
    }
    
    /**
     * @inheritDoc
     */
    public function withRequest(CP\RequestInterface $r): self
    {
        $that = $this->blueprinted();
        $that->i['req'] = $r;
        return $that;
    }
    
    /**
     * @inheritDoc
     */
    public function withLimit(int $n = 0): self
    {
        $that = $this->blueprinted();
        $that->i['limit'] = $n;
        return $that;
    }
    
    /**
     * @inheritDoc
     */
    public function withOffset(int $n = 0): self
    {
        $that = $this->blueprinted();
        $that->i['offset'] = $n;
        return $that;
    }
    
    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function processed(Entity\ResultInterface $r): Entity\ResultInterface
    {
        if (!isset($this->i['resp'])) {
            throw new InvalidArgumentException("`response` that contains a content is not defined");
        }
        $nextPage = (new ParsedEntity\Link\EntNext())->withText($this->i['html'])->value();
        $ads = (new ParsedEntity\Link\EntOffers())->withText($this->i['html'])->iterator();
        $ads->rewind();
        for ($missed = 0; $missed < $this->i['offset'] && $ads->valid(); $missed++) {
            $ads->next();
        }
        for ($processed = 0; $processed < $this->i['limit'] && $ads->valid(); $processed++) {
            $r =
                $this
                    ->ad
                    ->withResponse(
                        $this
                            ->prvdr
                            ->withRequest(
                                $this->i['req']->withPath($ads->current())
                            )
                            ->fetched(
                                new CP\HtmlResponse()
                            )
                    )
                    ->processed($r);
            $ads->next();
        }
        $r =
            $r
                ->withAppendCount('missed@ad', $missed)
                ->withAppendCount('processed@index', 1);
        if (!$ads->valid() && $nextPage) {
            $res =
                $this
                    ->withRequest(
                        $this->i['req']->withPath($nextPage)
                    )
                    ->withLimit($this->i['limit'] - $processed)
                    ->withOffset($this->i['offset'] - $missed)
                    ->processed($r);
        }
        return $r;
    }
    
    /**
     * Clones the instance
     * @return $this
     */
    public function blueprinted(): self
    {
        $that = new self($this->prvdr, $this->ad);
        $that->i = $this->i;
        return $that;
    }
}
