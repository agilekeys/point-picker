<?php declare(strict_types=1);

namespace Agilekeys\Priceline\Tests\Acceptance;

use Agilekeys\Priceline\Tests\TestCase;
use Agilekeys\Priceline\Crawler;
use Agilekeys\Priceline\Exceptions\CrawlerException;

final class CrawlerTest extends TestCase
{
    public function test_instance()
    {
        $this->expectException(CrawlerException::class);
        $url = sprintf('www.%s.com', $this->faker->md5);
        new Crawler($url);
        static::assertTrue(true);
    }
    
    public function test_instance_with_correct_url()
    {
        $url = 'http://google.com';
        $crawler = new Crawler($url);
        static::assertNotNull($crawler->getBody());
        static::assertTrue(true);        
    }
    
    public function test_filter_with_html()
    {
        $html = <<<'HTML'
<!DOCTYPE html>
<html>
    <body>
        <p class="message">Hello World!</p>
        <p>Hello Crawler!</p>
    </body>
</html>
HTML;
        $crawler = new Crawler('http://google.com');
        $crawler->setBody($html);
        $crawler->refresh();
        static::assertSame('Hello World!', $crawler->filter('body > p.message')->text());
    }
}

