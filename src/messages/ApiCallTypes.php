<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/23/2015
 * Time: 12:36 AM
 */

namespace hotelbeds\hotel_api_sdk\messages;

/**
 * Interface ApiCallTypes
 * @package hotelbeds\hotel_api_sdk\messages
 */
interface ApiCallTypes
{
    public const AVAILABILITY = 'hotels';
    public const BOOKING = 'bookings';
    public const CHECK_AVAIL = 'checkrates';
    public const STATUS = 'status';
}