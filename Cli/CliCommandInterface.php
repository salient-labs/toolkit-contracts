<?php declare(strict_types=1);

namespace Salient\Cli\Contract;

use Salient\Core\Contract\JsonSchemaInterface;

/**
 * A runnable CLI command
 *
 * @api
 */
interface CliCommandInterface extends CliCommandNodeInterface, JsonSchemaInterface
{
    /**
     * Parse the given arguments and run the command
     */
    public function __invoke(string ...$args): int;
}
