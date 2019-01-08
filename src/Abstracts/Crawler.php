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
    protected $parser;
    protected $file;
    protected $content;

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
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return CookieJar
     */
    public function getCookie(): CookieJar
    {
        return $this->cookie;
    }

    /**
     * @param CookieJar $cookie
     */
    public function setCookie(CookieJar $cookie): void
    {
        $this->cookie = $cookie;
    }

    /**
     * @return mixed
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * @param mixed $parser
     */
    public function setParser($parser): void
    {
        $this->parser = $parser;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
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
