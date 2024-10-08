<?php declare(strict_types=1);

namespace Salient\Contract\Core\Provider;

use Salient\Contract\Container\ServiceAwareInterface;
use Salient\Contract\Core\ListConformity;
use Salient\Contract\Iterator\FluentIteratorInterface;

/**
 * Serviced by a provider
 *
 * @template TProvider of ProviderInterface
 * @template TContext of ProviderContextInterface
 *
 * @extends ProviderAwareInterface<TProvider>
 * @extends ProviderContextAwareInterface<TContext>
 */
interface Providable extends
    ProviderAwareInterface,
    ServiceAwareInterface,
    ProviderContextAwareInterface
{
    /**
     * Create an instance of the class from an array on behalf of a provider
     *
     * @param mixed[] $data
     * @param TProvider $provider
     * @param TContext|null $context
     * @return static
     */
    public static function provide(
        array $data,
        ProviderInterface $provider,
        ?ProviderContextInterface $context = null
    );

    /**
     * Create instances of the class from arrays on behalf of a provider
     *
     * @param iterable<array-key,mixed[]> $list
     * @param TProvider $provider
     * @param ListConformity::* $conformity
     * @param TContext|null $context
     * @return FluentIteratorInterface<array-key,static>
     */
    public static function provideMultiple(
        iterable $list,
        ProviderInterface $provider,
        int $conformity = ListConformity::NONE,
        ?ProviderContextInterface $context = null
    ): FluentIteratorInterface;

    /**
     * Called after data from the provider has been applied to the object
     */
    public function postLoad(): void;
}
