<?php declare(strict_types=1);

namespace Salient\Contract\Console\Format;

use Salient\Contract\Console\Format\MessageAttributesInterface as MessageAttributes;
use Salient\Contract\Console\Format\TagAttributesInterface as TagAttributes;

interface FormatInterface extends HasTag
{
    /**
     * Format text before it is written to the target
     *
     * @param MessageAttributes|TagAttributes|null $attributes
     */
    public function apply(?string $string, $attributes = null): string;
}
