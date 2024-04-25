<?php declare(strict_types=1);

namespace Salient\Contract\Http;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Salient\Contract\Core\Immutable;
use Salient\Core\Exception\InvalidArgumentException;
use JsonSerializable;
use Stringable;

/**
 * @api
 */
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
     * Get the message as an HTTP payload
     */
    public function getHttpPayload(bool $withoutBody = false): string;

    /**
     * Get the message as an HTTP Archive (HAR) object
     *
     * @return array<string,mixed>
     */
    public function jsonSerialize(): array;
}
