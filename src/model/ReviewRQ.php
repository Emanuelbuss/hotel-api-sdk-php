<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/29/2015
 * Time: 4:53 PM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class ReviewRQ
 * @package hotelbeds\hotel_api_sdk\model
 * @property int $minRate minimum review wanted.
 * @property int $maxRate maximum review wanted.
 * @property string $type type of review i.e. TRIPADVISOR.
 */
class ReviewRQ extends ApiModel
{
    /**
     * @param ?array<integer|string> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            'minRate' => 'integer',
            'maxRate' => 'integer',
            'type' => 'string',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }
}
