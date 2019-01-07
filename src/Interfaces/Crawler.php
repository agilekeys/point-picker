<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 7/1/19
 * Time: 8:37 AM
 */

namespace Agilekeys\Priceline\Interfaces;


interface Crawler
{
    public function parse();

    /**
     * @param string $filter
     * @return mixed
     */
    public function filter(string $filter);

    public function refresh();
}