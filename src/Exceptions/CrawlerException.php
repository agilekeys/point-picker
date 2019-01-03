<?php declare(strict_types=1);
namespace Agilekeys\Priceline\Exceptions;

final class CrawlerException extends \Exception
{
    public function __construct(
        string $message = '',
        int $code = 0,
        \Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}