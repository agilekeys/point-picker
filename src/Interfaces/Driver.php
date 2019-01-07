<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 3:41 PM
 */

namespace Agilekeys\Priceline\Interfaces;


interface Driver
{
    public function filterName(): string;

    public function filterPrice(): string;
}
