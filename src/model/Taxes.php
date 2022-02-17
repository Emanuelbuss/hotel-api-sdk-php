<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 12:48 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

use Exception;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

/**
 * Class Taxes
 * @package hotelbeds\hotel_api_sdk\model
 * @property boolean $allIncluded Informs about if all taxes are included or not
 * @property ?array $taxes List of all taxes
 * @template-implements \IteratorAggregate<int,Tax>
 */
class Taxes extends ApiModel implements \IteratorAggregate
{
    /**
     * @param ?array<array<string,boolean|double|string>> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            'allIncluded' => 'boolean',
            'taxes' => 'array',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }

    /**
     * @deprecated use {@see getIterator}
     */
    public function iterator(): TaxesIterator
    {
        return new TaxesIterator($this->taxes ?? []);
    }

    public function getIterator(): TaxesIterator
    {
        return new TaxesIterator($this->taxes ?? []);
    }
}
