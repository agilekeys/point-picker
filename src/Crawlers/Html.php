<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 7/1/19
 * Time: 8:39 AM
 */

namespace Agilekeys\Priceline\Crawlers;

use Agilekeys\Priceline\Abstracts\Crawler as BaseCrawler;
use Agilekeys\Priceline\Exceptions\CrawlerException;
use Agilekeys\Priceline\Interfaces\Crawler;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;


final class Html extends BaseCrawler implements Crawler
{
    /** @var DomCrawler $parser */
    private $parser;

    /**
     * @throws CrawlerException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function parse()
    {
        try {
            $this->body = $this->client
                ->request('GET', '', ['cookies' => $this->cookie])
                ->getBody()
                ->getContents();
            $this->refresh();
        } catch (\Exception $e) {
            throw new CrawlerException($e->getMessage());
        }
    }

    /**
     * @param string $filter
     * @return DomCrawler
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
