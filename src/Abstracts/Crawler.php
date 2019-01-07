<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 7/1/19
 * Time: 8:43 AM
 */

namespace Agilekeys\Priceline\Abstracts;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

abstract class Crawler
{
    /** @var string $body */
    protected $body;

    /** @var string $url */
    protected $url;

    /** @var Client $client */
    protected $client;

    /** @var CookieJar */
    protected $cookie;

    /**
     * Html constructor.
     * @param string $url
     * @throws CrawlerException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->cookie = new CookieJar;
        $this->client = new Client(['base_uri' => $this->url]);
        $this->parse();
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