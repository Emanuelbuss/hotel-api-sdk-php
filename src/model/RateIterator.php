<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 2:26 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<Rate>
 */
class RateIterator implements \Iterator
{
    private array $rates;
    private int $position = 0;

    public function __construct(array $rates)
    {
        $this->rates = $rates;
    }

    public function current(): Rate
    {
        return new Rate($this->rates[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): string
    {
        return $this->rates[$this->position]['rateKey'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->rates);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
