<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/8/2015
 * Time: 1:30 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

use Exception;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

/**
 * Class Room
 * @package hotelbeds\hotel_api_sdk\model
 * @property integer $code Code of room
 * @property string $name Name of room
 * @property ?array $rates list of all rates of this room
 * @property array $paxes
 * @property integer $id
 * @property string $supplierReference
 * @template-implements \IteratorAggregate<string,Rate>
 */
class Room extends ApiModel implements \IteratorAggregate
{
    /**
     * @param ?array<string,integer|string|array<string,integer|string>|array<array<string,mixed>>> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            'code' => 'integer',
            // array<string,integer|string> paxes
            'paxes' => 'array',
            'id' => 'integer',
            'supplierReference' => 'string',
            'name' => 'string',
            // array<array<string,mixed>> rates
            'rates' => 'array',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }

    public function paxIterator(): PaxIterator
    {
        return new PaxIterator($this->paxes ?? []);
    }

    public function rateIterator(): RateIterator
    {
        return new RateIterator($this->rates ?? []);
    }

    public function getIterator(): RateIterator
    {
        return new RateIterator($this->rates ?? []);
    }
}
