<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/5/2015
 * Time: 12:15 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Occupancy
 * @package hotelbeds\hotel_api_sdk\model
 * @property integer $rooms Number of rooms
 * @property integer $adults
 * @property integer $children
 * @property array<array<string,integer|string>> $paxes List of paxes
 * @template-implements \IteratorAggregate<int,Pax>
 */
class Occupancy extends ApiModel implements \IteratorAggregate
{
    public function __construct()
    {
        $this->validFields = [
            'rooms' => 'integer',
            'adults' => 'integer',
            'children' => 'integer',
            // array<array<string,integer|string>> paxes
            'paxes' => 'array',
        ];
    }

    public function getIterator(): PaxIterator
    {
        return new PaxIterator($this->paxes ?? []);
    }

    public function paxIterator(): PaxIterator
    {
        return new PaxIterator($this->paxes ?? []);
    }
}
