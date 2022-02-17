<?php

/**
 * Created by PhpStorm.
 * User: xortiz
 * Date: 07/09/2016
 * Time: 06:21 PM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * @template-implements \Iterator<CreditCard>
 */
class CreditCardIterator implements \Iterator
{
    private array $creditcards;
    private int $position = 0;

    public function __construct(array $creditcards)
    {
        $this->creditcards = $creditcards;
    }

    public function current(): CreditCard
    {
        return new CreditCard($this->creditcards[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): string
    {
        return $this->creditcards[$this->position]['code'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->creditcards);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
