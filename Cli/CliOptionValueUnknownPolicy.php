<?php declare(strict_types=1);

namespace Salient\Contract\Cli;

use Salient\Core\AbstractEnumeration;

/**
 * Unknown value policy for command line options of type ONE_OF, ONE_OF_OPTIONAL
 * and ONE_OF_POSITIONAL
 *
 * @api
 *
 * @extends AbstractEnumeration<int>
 */
final class CliOptionValueUnknownPolicy extends AbstractEnumeration
{
    /**
     * Throw an exception if an unknown value is given
     *
     * This is the default policy.
     */
    public const REJECT = 0;

    /**
     * If an unknown value is given, print a warning and discard it
     */
    public const DISCARD = 1;

    /**
     * Silently accept unknown values
     */
    public const ACCEPT = 2;
}
