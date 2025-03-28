<?php declare(strict_types=1);

namespace Salient\Contract\Http;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Salient\Contract\Core\Immutable;
use InvalidArgumentException;
use JsonSerializable;
use Stringable;

interface HttpMessageInterface extends
    MessageInterface,
    Stringable,
    JsonSerializable,
    Immutable
{
    /**
     * Get an instance of the class from a compatible PSR-7 message
     *
     * @template T of MessageInterface
     *
     * @param T $message
     * @return T&HttpMessageInterface
     * @throws InvalidArgumentException if the class cannot be instantiated from
     * `$message`, e.g. if the class implements {@see RequestInterface} and
     * `$message` is a {@see ResponseInterface}.
     */
    public static function fromPsr7(MessageInterface $message): HttpMessageInterface;

    /**
     * Get the HTTP headers of the message
     */
    public function getHttpHeaders(): HttpHeadersInterface;

    /**
     * Get the value of a message header as a list of values, splitting any
     * comma-separated values
     *
     * @return string[]
     */
    public function getHeaderValues(string $name): array;

    /**
     * Get the first value of a message header after splitting any
     * comma-separated values
     */
    public function getFirstHeaderValue(string $name): string;

    /**
     * Get the last value of a message header after splitting any
     * comma-separated values
     */
    public function getLastHeaderValue(string $name): string;

    /**
     * Get the only value of a message header after splitting any
     * comma-separated values
     *
     * An exception is thrown if the header has more than one value.
     */
    public function getOnlyHeaderValue(string $name, bool $orSame = false): string;

    /**
     * Get the message as an HTTP payload
     */
    public function getHttpPayload(bool $withoutBody = false): string;

    /**
     * Get the message as an HTTP Archive (HAR) object
     *
     * @return array{httpVersion:string,cookies:array<array{name:string,value:string,path?:string,domain?:string,expires?:string,httpOnly?:bool,secure?:bool}>,headers:array<array{name:string,value:string}>,headersSize:int,bodySize:int}
     */
    public function jsonSerialize(): array;
}
