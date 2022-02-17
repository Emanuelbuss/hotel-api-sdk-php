<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 2:21 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<Hotel>
 */
class HotelIterator implements \Iterator
{
    private array $hotels;
    private int $position = 0;

    public function __construct(array $hotels)
    {
        $this->hotels = $hotels;
    }

    public function current(): Hotel
    {
        return new Hotel($this->hotels[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->hotels[$this->position]['code'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->hotels);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
