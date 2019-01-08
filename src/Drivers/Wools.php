<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 3:50 PM
 */

namespace Agilekeys\Priceline\Drivers;

use Agilekeys\Priceline\Abstracts\Driver;
use Agilekeys\Priceline\Crawlers\Json;
use Agilekeys\Priceline\Interfaces\Driver as DriverInterface;

class Wools extends Driver implements DriverInterface
{
    /** @var string $crawlerClass */
    protected $crawlerClass = Json::class;

    /**
     * @return string
     */
    public function filterName(): string
    {
        return $this->crawler->filter('ProductDetail.Product.Name') ?? '';
    }

    /**
     * @return string
     */
    public function filterPrice(): string
    {
        return (string)$this->crawler->filter('ProductDetail.Product.Price') ?? '';
    }
}
