<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 2:29 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class CancellationPoliciesIterator
 * @package hotelbeds\hotel_api_sdk\model
 * @template-implements \Iterator<CancellationPolicy>
 */
class CancellationPoliciesIterator implements \Iterator
{
    private array $cancelPolicies;
    private int $position = 0;

    public function __construct(array $policies)
    {
        $this->cancelPolicies = $policies;
    }

    public function current(): CancellationPolicy
    {
        return new CancellationPolicy($this->cancelPolicies[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): string
    {
        return $this->cancelPolicies[$this->position]['from'];
    }

    public function valid(): bool
    {
        return $this->position < count($this->cancelPolicies);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
