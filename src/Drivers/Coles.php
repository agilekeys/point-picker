<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 3:50 PM
 */

namespace Agilekeys\Priceline\Drivers;

use Agilekeys\Priceline\Abstracts\Driver;
use Agilekeys\Priceline\Crawlers\File;
use Agilekeys\Priceline\Interfaces\Driver as DriverInterface;

final class Coles extends Driver implements DriverInterface
{
    /** @var string $crawlerClass */
    protected $crawlerClass = File::class;

    /**
     * @return string
     */
    public function filterName(): string
    {
        return $this->crawler->filter('span.product-name')->text() ?? '';
    }

    /**
     * @return string
     */
    public function filterPrice(): string
    {
        return (string)$this->crawler->filter('strong.product-price')->text() ?? '';
    }
}
