<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 7/1/19
 * Time: 3:57 PM
 */

namespace Agilekeys\Priceline\Crawlers;

use Agilekeys\Priceline\Abstracts\Crawler as BaseCrawler;
use Agilekeys\Priceline\Exceptions\CrawlerException;
use Agilekeys\Priceline\Interfaces\Crawler;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class File extends BaseCrawler implements Crawler
{
    protected $file;
    /**
     * File constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->file = $path;
    }

    /**
     * @throws CrawlerException
     */
    public function parse()
    {
        try {
            $this->body = \file_get_contents($this->file, true);
            $this->refresh();
        } catch (\Exception $e) {
            throw new CrawlerException($e->getMessage());
        }
    }

    /**
     * @param string $filter
     * @return mixed
     */
    public function filter(string $filter)
    {
        return $this->parser->filter($filter);
    }

    public function refresh()
    {
        $this->parser = new DomCrawler($this->body);
    }
}
