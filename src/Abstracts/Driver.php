<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 4/1/19
 * Time: 3:53 PM
 */

namespace Agilekeys\Priceline\Abstracts;

use Agilekeys\Priceline\Crawler;
use phpDocumentor\Reflection\Types\This;

abstract class Driver
{
    /** @var mixed $crawler */
    protected $crawler;

    /** @var string $url */
    private $url;

    /**
     * Driver constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return $this
     * @throws \Agilekeys\Priceline\Exceptions\CrawlerException
     */
    public function connect(): self
    {
        $this->crawler = $this->getCrawler();
        return $this;
    }

    /**
     * @return Crawler|mixed
     * @throws \Agilekeys\Priceline\Exceptions\CrawlerException
     */
    public function getCrawler()
    {
        if ($this->crawler === null) {
            $this->crawler = new $this->crawlerClass($this->url);
            $this->crawler->parse();
        }
        return $this->crawler;
    }

    /**
     * @param mixed $crawler
     */
    public function setCrawler($crawler): void
    {
        $this->crawler = $crawler;
    }
}
