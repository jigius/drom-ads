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

use Jigius\Httpcli\Request\ClientInterface;

/**
 * TODO IMPLEMENT!!!
 */
final class HtmlResponse implements ResponseInterface
{
    /**
     * @var ClientInterface
     */
    private ClientInterface $client;
    /**
     * @var array|string[]
     */
    private array $permited;
    
    /**
     *
     */
    public function __construct(array $contentTypesPermitted = ["text/html"])
    {
        $this->permited = $contentTypesPermitted;
    }
    
    /**
     * @inheritDoc
     * @return resource
     */
    public function resource()
    {
        // TODO: Implement resource() method.
        $pathfile = tempnam(sys_get_temp_dir(), "drom_");
        return fopen($pathfile, "rb");
    }
    
    /**
     * @inheritDoc
     */
    public function content(): string
    {
        return "hello there!!!";
    }
    
    /**
     * @inheritDoc
     */
    public function headers(): array
    {
        return [];
    }
    
    /**
     * @inheritDoc
     */
    public function header(string $name)
    {
        return "foobar";
    }
    
    /**
     * @inheritDoc
     */
    public function hasHeader(string $name): bool
    {
        return false;
    }
}
