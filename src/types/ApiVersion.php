<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/27/2015
 * Time: 3:14 AM
 */

namespace hotelbeds\hotel_api_sdk\types;

/**
 * Interface ApiVersions. Define all available versions
 * @package hotelbeds\hotel_api_sdk\types
 */
interface ApiVersions
{
    public const V0_2 = "0.2";
    public const V1_0 = "1.0";//Default version
    public const V1_1 = "1.1";
    public const V1_2 = "1.2";//Use this version only for booking WITHOUT credit card details
    public const V2_0 = "2.0";//Future release

    public function __construct(string $version);

    public function getVersion();
}

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
