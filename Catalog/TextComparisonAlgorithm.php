<?php declare(strict_types=1);

namespace Salient\Contract\Catalog;

/**
 * @api
 */
interface TextComparisonAlgorithm
{
    /**
     * Uncertainty is 0 if values are identical, otherwise 1
     */
    public const SAME = 1;

    /**
     * Uncertainty is 0 if the longer value contains the shorter value,
     * otherwise 1
     */
    public const CONTAINS = 2;

    /**
     * Uncertainty is derived from levenshtein()
     *
     * String length cannot exceed 255 characters.
     */
    public const LEVENSHTEIN = 4;

    /**
     * Uncertainty is derived from similar_text()
     */
    public const SIMILAR_TEXT = 8;

    /**
     * Uncertainty is derived from shared ngrams relative to the longest string
     */
    public const NGRAM_SIMILARITY = 16;

    /**
     * Uncertainty is derived from shared ngrams relative to the shortest string
     */
    public const NGRAM_INTERSECTION = 32;
}
