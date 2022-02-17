<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 2:21 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<int,Hotel>
 */
class HotelIterator implements \Iterator
{
    /** @var array<array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>>  */
    private array $hotels;
    private int $position = 0;

    /**
     * @param array<array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>> $hotels
     */
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
