<?php
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 4:50 PM
 */

namespace Agilekeys\Priceline\Tests\Acceptance;

use Agilekeys\Priceline\Drivers\Wools;
use Agilekeys\Priceline\Tests\TestCase;

class WoolsTest extends TestCase
{
    public function test_get_name()
    {
        $url = 'https://www.woolworths.com.au/api/v3/ui/product/content/575615';

        $woo = new Wools($url);

        static::assertStringContainsString('Nestle Nan Supreme Stage 4', $woo->filterName());
    }

    public function test_get_price()
    {
        $url = 'https://www.woolworths.com.au/api/v3/ui/product/content/575615';

        $woo = new Wools($url);

        static::assertStringContainsString('22', $woo->filterPrice());
    }
}
