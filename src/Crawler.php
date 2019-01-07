<?php declare(strict_types=1);

namespace Agilekeys\Priceline;

use Agilekeys\Priceline\Exceptions\CrawlerException;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use GuzzleHttp\Cookie\CookieJar;

final class Crawler
{
    /** @var string $url */
    private $url;

    /** @var string $body */
    private $body;

    /** @var Client $client */
    private $client;

    /** @var DomCrawler $parser */
    private $parser;

    /** @var CookieJar  */
    private $cookie;

    /**
     * Crawler constructor.
     * @param string $url
     * @throws CrawlerException
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->cookie = new CookieJar;
        $this->client = new Client(['base_uri' => $this->url]);
        $this->parse();
    }

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
            $this->parser = new DomCrawler($this->body);
        } catch (\Exception $e) {
            throw new CrawlerException($e->getMessage());
        }
    }

    /**
     * @param string $filter
     */
    public function filter(string $filter)
    {
        return $this->parser->filter($filter);
    }

    public function refresh()
    {
        $this->parser = new DomCrawler($this->body);
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }
}
