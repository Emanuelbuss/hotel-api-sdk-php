<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/27/2015
 * Time: 3:14 AM
 */

namespace hotelbeds\hotel_api_sdk\types;

/**
 * Class ApiVersion. Simple class define API version
 * @package hotelbeds\hotel_api_sdk\types
 */
class ApiVersion implements ApiVersions
{
    /**
     * @var string contains string of version
     */
    private string $version;

    /**
     * ApiVersion constructor.
     */
    public function __construct(string $version)
    {
        $this->version = $version;
    }

    /**
     * Return version string of version
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
