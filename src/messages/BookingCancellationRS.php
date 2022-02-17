<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 12/25/2015
 * Time: 9:31 PM
 */

namespace hotelbeds\hotel_api_sdk\messages;

use hotelbeds\hotel_api_sdk\traits\AuditDataTrait;

/**
 * Class BookingCancellationRS
 * @package hotelbeds\hotel_api_sdk\messages
 */
class BookingCancellationRS extends ApiResponse
{
    use AuditDataTrait;
}