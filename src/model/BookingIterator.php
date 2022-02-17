<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/24/2015
 * Time: 1:03 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<string,Booking>
 */
class BookingIterator implements \Iterator
{
    /** @var array<array<string,double|string|array<string,string|bool>|array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>>>  */
    private array $bookings;
    private int $position = 0;

    /**
     * @param array<array<string,double|string|array<string,string|bool>|array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>>> $bookings
     */
    public function __construct(array $bookings)
    {
        $this->bookings = $bookings;
    }

    public function current(): Booking
    {
        return new Booking($this->bookings[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): string
    {
        return $this->bookings[$this->position]['reference'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->bookings);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
