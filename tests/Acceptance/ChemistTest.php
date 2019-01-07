<?php
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 4:42 PM
 */

namespace Agilekeys\Priceline\Tests\Acceptance;

use Agilekeys\Priceline\Drivers\Chemist;
use Agilekeys\Priceline\Tests\TestCase;

class ChemistTest extends TestCase
{
    public function test_get_name()
    {
        $url = 'https://www.chemistwarehouse.com.au/buy/79795/swisse-ultiboost-co-enzyme-q10-150mg-180-capsules';

        $ch = new Chemist($url);

        static::assertStringContainsString('Swisse Ultiboost Co Enzyme Q10 150mg 180 Capsules', $ch->filterName());
    }

    public function test_get_price()
    {
        $url = 'https://www.chemistwarehouse.com.au/buy/79795/swisse-ultiboost-co-enzyme-q10-150mg-180-capsules';

        $ch = new Chemist($url);

        static::assertStringContainsString('$39.99', $ch->filterPrice());
    }
}
