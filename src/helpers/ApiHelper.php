<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/4/2015
 * Time: 7:27 PM
 */

namespace hotelbeds\hotel_api_sdk\helpers;

use hotelbeds\hotel_api_sdk\generic\DataContainer;

abstract class ApiHelper extends DataContainer
{
    /**
     * @throws \JsonException
     */
    public function __toString()
    {
        /** @var string $json */
        $json = json_encode($this, JSON_THROW_ON_ERROR) ?: '';
        return $json;
    }
}
