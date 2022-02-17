<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 1:33 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Hotels
 * @package hotelbeds\hotel_api_sdk\model
 * @property integer $total Total number of hotels
 * @property \DateTime $checkIn
 * @property \DateTime $checkOut
 * @property array<array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>> $hotels
 * @template-implements \IteratorAggregate<int,Hotel>
 */
class Hotels extends ApiModel implements \IteratorAggregate
{
    /**
     * @param array<string,\DateTime|integer|array<array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>>> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            // array<array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>>
            'hotels' => 'array',
            'checkIn' => 'DateTime',
            'checkOut' => 'DateTime',
            'total' => 'integer'
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }

    /**
     * @deprecated use {@see getIterator}
     */
    public function iterator(): HotelIterator
    {
        return new HotelIterator($this->hotels ?? []);
    }

    /**
     * @return HotelIterator For iterate hotels list
     */
    public function getIterator(): HotelIterator
    {
        return new HotelIterator($this->hotels ?? []);
    }
}
