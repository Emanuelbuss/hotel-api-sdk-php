<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/24/2015
 * Time: 1:03 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<Booking>
 */
class BookingIterator implements \Iterator
{
    private array $bookings;
    private int $position = 0;

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
