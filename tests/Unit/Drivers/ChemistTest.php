<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 8/1/19
 * Time: 4:53 PM
 */

namespace Agilekeys\Priceline\Tests\Unit\Drivers;

use Agilekeys\Priceline\Crawlers\Html;
use Agilekeys\Priceline\Drivers\Chemist;
use Agilekeys\Priceline\Tests\TestCase;
use Symfony\Component\DomCrawler\Crawler;

final class ChemistTest extends TestCase
{
    public function test_class()
    {
        $url = $this->faker->url;
        $obj = new Chemist($url);
        static::assertEquals($url, $obj->getUrl());
    }

    public function test_filter_name()
    {
        $name = $this->faker->md5;
        $filterName = 'div.product-name > h1';

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
        $obj = new Chemist($url);
        $obj->setCrawler($htmlCrawler);

        static::assertEquals($name, $obj->filterName());
    }

    public function test_filter_price()
    {
        $price = (string)$this->faker->randomFloat();
        $filterName = 'div.Price > span';

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
        $obj = new Chemist($url);
        $obj->setCrawler($htmlCrawler);

        static::assertEquals($price, $obj->filterPrice());
    }
}
