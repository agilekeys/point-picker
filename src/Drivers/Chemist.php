<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 4:17 PM
 */

namespace Agilekeys\Priceline\Drivers;

use Agilekeys\Priceline\Abstracts\Driver;
use Agilekeys\Priceline\Crawlers\Html;
use Agilekeys\Priceline\Interfaces\Driver as DriverInterface;

class Chemist extends Driver implements DriverInterface
{
    /** @var string $crawlerClass */
    protected $crawlerClass = Html::class;

    /**
     * @return string
     */
    public function filterName(): string
    {
        return $this->crawler->filter('div.product-name > h1')->text();
    }

    /**
     * @return string
     */
    public function filterPrice(): string
    {
        return $this->crawler->filter('div.Price > span')->text();
    }
}
