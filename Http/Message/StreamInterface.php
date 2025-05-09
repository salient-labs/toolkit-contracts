<?php declare(strict_types=1);

namespace Salient\Contract\Http\Message;

use Psr\Http\Message\StreamInterface as PsrStreamInterface;
use Stringable;

/**
 * @api
 */
interface StreamInterface extends PsrStreamInterface, Stringable {}
