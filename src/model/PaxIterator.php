<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/14/2015
 * Time: 11:25 PM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class PromotionsIterator
 * @package hotelbeds\hotel_api_sdk\model
 * @template-implements \Iterator<int,Pax>
 */
class PaxIterator implements \Iterator
{
    /**
     * @var array<array<string,integer|string>> Contains all promotions of iterate
     */
    private array $paxes;

    private int $position = 0;

    /**
     * @param array<array<string,integer|string>> $paxes Promotions list
     */
    public function __construct(array $paxes)
    {
        $this->paxes = $paxes;
    }

    public function current(): Pax
    {
        return Pax::load($this->paxes[$this->position]);
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
        return $this->position < count($this->paxes);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
