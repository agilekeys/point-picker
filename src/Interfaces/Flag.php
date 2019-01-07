<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 3:46 PM
 */

namespace Agilekeys\Priceline\Interfaces;


interface Flag
{
    public function setUrl(): string;

    public function getUrl(): string;
}
