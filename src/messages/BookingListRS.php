<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/20/2015
 * Time: 2:47 AM
 */

namespace hotelbeds\hotel_api_sdk\messages;

use hotelbeds\hotel_api_sdk\model\Bookings;
use hotelbeds\hotel_api_sdk\traits\AuditDataTrait;

/**
 * Class BookingListRS
 * @package hotelbeds\hotel_api_sdk\messages
 * @property Bookings $bookings List of bookings
 */
class BookingListRS extends ApiResponse
{
    use AuditDataTrait;

    /**
     * @throws FieldNotExists
     */
    public function __construct(array $rsData)
    {
        parent::__construct($rsData);
        if (array_key_exists("bookings", $rsData)) {
            $this->bookings = new Bookings($this->__get('bookings'));
        }
    }

    /**
     * @return bool Returns True when response hotels list is empty. False otherwise.
     */
    public function isEmpty(): bool
    {
        return $this->bookings->total === 0;
    }
}
