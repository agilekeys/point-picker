<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 9/1/19
 * Time: 8:48 AM
 */

namespace Agilekeys\Priceline\Tests\Unit\Drivers;

use Agilekeys\Priceline\Crawlers\Json;
use Agilekeys\Priceline\Drivers\Wools;
use Agilekeys\Priceline\Tests\TestCase;

class WoolsTest extends TestCase
{
    public function test_class()
    {
        $url = $this->faker->url;
        $obj = new Wools($url);
        static::assertEquals($url, $obj->getUrl());
    }

    public function test_filter_name()
    {
        $name = $this->faker->md5;
        $filterName = 'ProductDetail.Product.Name';

        $htmlCrawler = \Mockery::mock(Json::class)
            ->shouldReceive('filter')
            ->with($filterName)
            ->once()
            ->andReturn($name)
            ->getMock();

        $url = $this->faker->url;
        $obj = new Wools($url);
        $obj->setCrawler($htmlCrawler);

        static::assertEquals($name, $obj->filterName());
    }

    public function test_filter_price()
    {
        $price = (string)$this->faker->randomFloat();
        $filterName = 'ProductDetail.Product.Price';

        $htmlCrawler = \Mockery::mock(Json::class)
            ->shouldReceive('filter')
            ->with($filterName)
            ->once()
            ->andReturn($price)
            ->getMock();

        $url = $this->faker->url;
        $obj = new Wools($url);
        $obj->setCrawler($htmlCrawler);

        static::assertEquals($price, $obj->filterPrice());
    }
}
