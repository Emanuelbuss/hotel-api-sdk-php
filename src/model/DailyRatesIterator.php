<?php
/**
 * Created by PhpStorm.
 * User: xortiz
 * Date: 08/09/2016
 * Time: 08:09 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class DailyRatesIterator
 * @package hotelbeds\hotel_api_sdk\model
 * @template-implements \Iterator<DailyRate>
 */
class DailyRatesIterator implements \Iterator
{
    private array $dailyrates;
    private int $position = 0;

    public function __construct(array $dailyrates)
    {
        $this->dailyrates = $dailyrates;
    }

    public function current(): DailyRate
    {
        return new DailyRate($this->dailyrates[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->dailyrates[$this->position]['offset'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->dailyrates);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}

