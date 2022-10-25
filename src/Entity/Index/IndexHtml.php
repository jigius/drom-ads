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

final class IndexHtml implements IndexHtmlInterface
{
    /**
     * @var array
     */
    private array $i;

    /**
     * @var OfferHtmlInterface
     */
    private OfferHtmlInterface $offer;
    
    /**
     * Cntr
     */
    public function __construct(
        CapableDownloadHtmlPageViaHttpInterface $htmlProvider,
        OfferHtmlInterface $offer
    ) {
        $this->prvdrHtml = $htmlProvider;
        $this->offer = $offer;
        $this->i = [];
    }
    
    /**
     * @inheritDoc
     */
    public function withContent(string &$html): self
    {
        $that = $this->blueprinted();
        $that->i['html'] = $html;
        return $that;
    }
    
    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function processed(int $limit = 1, int $offset = 0): ResultInterface
    {
        if (!isset($this->i['html'])) {
            throw new InvalidArgumentException("`content` is not defined");
        }
        $next = (new ParsedEntity\Link\EntNext())->withText($this->i['html'])->value();
        $offers = (new ParsedEntity\Link\EntOffers())->withText($this->i['html'])->iterator();
        $offers->rewind();
        while ($offset-- > 0 && $offers->valid()) {
            $offers->next();
        }
        for ($i = 0; $i < $limit && $offers->valid(); $i++) {
            $uri = $offers->current();
            $this
                ->prnOffer
                ->withResponse(
                    $this
                        ->prvdrHtml
                        ->
                )
        }
        
        
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
