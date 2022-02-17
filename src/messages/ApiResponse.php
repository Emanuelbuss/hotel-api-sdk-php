<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/27/2015
 * Time: 3:12 AM
 */

namespace hotelbeds\hotel_api_sdk\messages;

/**
 * Class FieldNotExists
 * @package hotelbeds\hotel_api_sdk\messages
 */
class FieldNotExists extends \Exception
{
}

/**
 * Class ApiResponse
 * @package hotelbeds\hotel_api_sdk\messages
 */
abstract class ApiResponse implements \JsonSerializable
{
    /**
     * @var array Contains data response
     */
    private array $responseData;

    /**
     * ApiResponse constructor.
     * @param array $rsData
     */
    public function __construct(array $rsData)
    {
        $this->responseData = $rsData;
    }

    /**
     * Getter magical method can get field value.
     * @param string $field Field name
     * @return mixed Field value
     * @throws FieldNotExists If field not exists
     */
    public function __get(string $field)
    {
        if (!array_key_exists($field, $this->responseData)) {
            throw new FieldNotExists("$field not exists in this data response");
        }

        return $this->responseData[$field];
    }

    public function __isset(string $field)
    {
        return isset($this->responseData[$field]);
    }

    /**
     * Setter magical method
     * @param string $field Field Name
     * @param mixed $value Field value
     */
    public function __set(string $field, $value)
    {
        $this->responseData[$field] = $value;
    }

    /**
     * Return array data response.
     * @return array response data in array format
     */
    public function toArray(): array
    {
        return $this->responseData;
    }

    public function jsonSerialize(): array
    {
        return $this->responseData;
    }
}