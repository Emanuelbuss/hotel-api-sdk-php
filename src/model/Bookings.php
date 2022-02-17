<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/24/2015
 * Time: 12:06 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

use Exception;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

/**
 * Class Bookings
 * @package hotelbeds\hotel_api_sdk\model
 * @property ?array $bookings
 * @property integer $from
 * @property integer $to
 * @property integer $total
 * @template-implements \IteratorAggregate<string,Booking>
 */
class Bookings extends ApiModel implements \IteratorAggregate
{
    /**
     * @param array<string,integer|array<array<string,double|string|array<string,string|bool>|array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>>>> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            'bookings' => 'array',
            'from' => 'integer',
            'to' => 'integer',
            'total' => 'integer',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }

    /**
     * @deprecated use {@see getIterator}
     */
    public function iterator(): BookingIterator
    {
        return new BookingIterator($this->bookings ?? []);
    }

    public function getIterator(): BookingIterator
    {
        return new BookingIterator($this->bookings ?? []);
    }
}
