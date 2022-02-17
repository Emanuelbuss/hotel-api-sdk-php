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
 * @template-implements \Iterator<string,Promotion>
 */
class PromotionsIterator implements \Iterator
{
    /**
     * @var array<array<string,string>> Contains all promotions of iterate
     */
    private array $promotions;

    /**
     * @var int actual position of iterator
     */
    private int $position = 0;

    /**
     * PromotionsIterator constructor.
     * @param array<array<string,string>> $promotions Promotions list
     */
    public function __construct(array $promotions)
    {
        $this->promotions = $promotions;
    }

    /**
     * @return Promotion Return actual Promotion object
     */
    public function current(): Promotion
    {
        return new Promotion($this->promotions[$this->position]);
    }

    /**
     * Next promotion in promotions list
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * Return a promotion code
     * @return string return a promotion code
     */
    public function key(): string
    {
        return $this->promotions[$this->position]['code'];
    }

    /**
     * Test if at the end?
     * @return bool
     */
    public function valid(): bool
    {
        return $this->position < count($this->promotions);
    }

    /**
     * Reset promotions cursor.
     */
    public function rewind(): void
    {
        $this->position = 0;
    }
}
