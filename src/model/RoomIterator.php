<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 2:01 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<int,Room>
 */
class RoomIterator implements \Iterator
{
    /** @var array<array<string,integer|string|array<string,integer|string>|array<array<string,mixed>>>>  */
    private array $rooms;
    private int $position = 0;

    /**
     * @param array<array<string,integer|string|array<string,integer|string>|array<array<string,mixed>>>> $rooms
     */
    public function __construct(array $rooms)
    {
        $this->rooms = $rooms;
    }

    public function current(): Room
    {
        return new Room($this->rooms[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->rooms[$this->position]['code'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->rooms);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
