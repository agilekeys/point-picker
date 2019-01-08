<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: duan.li
 * Date: 7/1/19
 * Time: 8:40 AM
 */

namespace Agilekeys\Priceline\Crawlers;

use Agilekeys\Priceline\Abstracts\Crawler as BaseCrawler;
use Agilekeys\Priceline\Exceptions\CrawlerException;
use Agilekeys\Priceline\Interfaces\Crawler;

final class Json extends BaseCrawler implements Crawler
{
    /** @var array $content */
    protected $content;
    /** @var string $body */
    protected $body;

    public function parse()
    {
        try {
            $this->body = $this->client
                ->request('GET', '', ['cookies' => $this->cookie])
                ->getBody()
                ->getContents();
            $this->content = json_decode($this->body, true);
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
        return array_get($this->content, $filter);
    }

    public function refresh()
    {
        $this->content = json_decode($this->body, true);
    }
}
