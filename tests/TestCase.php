<?php declare(strict_types=1);
namespace Agilekeys\Priceline\Tests;

use PHPUnit\Framework\TestCase as BaseCase;
use Faker\Factory as FakerFactory;

class TestCase extends BaseCase
{
    protected $faker;
    
    public function setUp()
    {
        $this->faker = FakerFactory::create('en_AU');
        parent::setUp();
    }
}