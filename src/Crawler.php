<?php declare(strict_types=1);
namespace Agilekeys\Priceline;

use Agilekeys\Priceline\Exceptions\CrawlerException;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

final class Crawler
{
    private $url;
    
    private $body;
    
    private $client;
    
    private $parser;
    
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->parse();
    }
    
    public function parse()
    {
        try {
            $this->client = new Client(['base_uri' => $url]);
            $response = $this->client->request('GET');
            $this->body = $response->getBody()->getContents();
            $this->parser = new DomCrawler($this->body);
        } catch (\Exception $e) {
            throw new CrawlerException($e->getMessage());
        }
    }

    public function filter(string $filter)
    {
        return $this->parser->filter($filter);
    }
    
    public function refresh()
    {
        $this->parser = new DomCrawler($this->body);
    }
    
    public function getBody(): string
    {
        return $this->body;
    }
    
    public function setBody(string $body)
    {
        $this->body = $body;
    }
    

}
