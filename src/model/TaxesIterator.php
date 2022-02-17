<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 2:30 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class TaxesIterator
 * @package hotelbeds\hotel_api_sdk\model
 * @template-implements \Iterator<Tax>
 */
class TaxesIterator implements \Iterator
{
    private int $position = 0;
    private array $taxes;

    public function __construct(array $taxes)
    {
        $this->taxes = $taxes;
    }

    public function current(): Tax
    {
        return new Tax($this->taxes[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return $this->position < count($this->taxes);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
