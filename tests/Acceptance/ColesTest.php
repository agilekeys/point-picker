<?php
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 4:28 PM
 */

namespace Agilekeys\Priceline\Tests\Acceptance;

use Agilekeys\Priceline\Drivers\Coles;
use Agilekeys\Priceline\Tests\TestCase;

class ColesTest extends TestCase
{
    public function test_get_name()
    {
        $url = 'https://shop.coles.com.au/search/resources/store/20501/productview/bySeoUrlKeyword/nan-optipro--ha-gold-formula-stage-1?catalogId=29102';
        $file = __DIR__.'/../../tmp/test.html';
        $coles = new Coles($file);

        static::assertEquals('NAN Supreme Stage 1 0-6 Months', $coles->filterName());
    }

    public function test_get_price()
    {
        $file = __DIR__.'/../../tmp/test.html';
        $coles = new Coles($file);

        static::assertStringContainsString('29', $coles->filterPrice());
    }
}
