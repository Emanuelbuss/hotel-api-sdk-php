<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/30/2015
 * Time: 12:05 AM
 */

namespace hotelbeds\hotel_api_sdk\messages;

use hotelbeds\hotel_api_sdk\model\Booking;
use hotelbeds\hotel_api_sdk\traits\AuditDataTrait;

/**
 * Class BookingConfirmRS
 * @property ?Booking $booking
 * @package hotelbeds\hotel_api_sdk\messages
 */
class BookingConfirmRS extends ApiResponse
{
    use AuditDataTrait;

    /**
     * BookingConfirmRS constructor.
     * @throws FieldNotExists
     */
    public function __construct(array $rsData)
    {
        parent::__construct($rsData);
        if (array_key_exists('booking', $rsData)) {
            $this->booking = new Booking($this->__get('booking'));
        }
    }
}
