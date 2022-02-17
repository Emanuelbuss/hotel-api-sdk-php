<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/24/2015
 * Time: 11:02 PM
 */

namespace hotelbeds\hotel_api_sdk\messages;

use hotelbeds\hotel_api_sdk\model\Hotel;
use hotelbeds\hotel_api_sdk\traits\AuditDataTrait;

/**
 * @property Hotel $hotel
 */
class CheckRateRS extends ApiResponse
{
    use AuditDataTrait;

    /**
     * @throws FieldNotExists
     */
    public function __construct(array $rsData)
    {
        parent::__construct($rsData);
        if (array_key_exists('hotel', $rsData)) {
            $this->hotel = new Hotel($this->__get('hotel'));
        }
    }
}
