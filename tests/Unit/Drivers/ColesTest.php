<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 9/1/19
 * Time: 8:41 AM
 */

namespace Agilekeys\Priceline\Tests\Unit\Drivers;

use Agilekeys\Priceline\Crawlers\Html;
use Agilekeys\Priceline\Drivers\Coles;
use Agilekeys\Priceline\Tests\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class ColesTest extends TestCase
{
    public function test_class()
    {
        $url = $this->faker->url;
        $obj = new Coles($url);
        static::assertEquals($url, $obj->getUrl());
    }

    public function test_filter_name()
    {
        $name = $this->faker->md5;
        $filterName = 'span.product-name';

        $crawler = \Mockery::mock(Crawler::class)
            ->shouldReceive('text')
            ->once()
            ->andReturn($name)
            ->getMock();

        $htmlCrawler = \Mockery::mock(Html::class)
            ->shouldReceive('filter')
            ->with($filterName)
            ->once()
            ->andReturn($crawler)
            ->getMock();

        $url = $this->faker->url;
        $obj = new Coles($url);
        $obj->setCrawler($htmlCrawler);

        static::assertEquals($name, $obj->filterName());
    }

    public function test_filter_price()
    {
        $price = (string)$this->faker->randomFloat();
        $filterName = 'strong.product-price';

        $crawler = \Mockery::mock(Crawler::class)
            ->shouldReceive('text')
            ->once()
            ->andReturn($price)
            ->getMock();

        $htmlCrawler = \Mockery::mock(Html::class)
            ->shouldReceive('filter')
            ->with($filterName)
            ->once()
            ->andReturn($crawler)
            ->getMock();

        $url = $this->faker->url;
        $obj = new Coles($url);
        $obj->setCrawler($htmlCrawler);

        static::assertEquals($price, $obj->filterPrice());
    }
}
