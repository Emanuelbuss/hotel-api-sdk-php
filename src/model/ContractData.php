<?php

/**
 * @author Hotelbeds Group
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class ContractData
 * @package hotelbeds\hotel_api_sdk\model
 * @property string $email Email
 * @property string $phoneNumber Phone number
 */
class ContractData extends ApiModel
{
    public function __construct(string $email = null, string $phoneNumber = null)
    {
        $this->validFields = [
            'email' => 'string',
            'phoneNumber' => 'string',
        ];

        if ($email !== null) {
            $this->email = $email;
        }
        if ($phoneNumber !== null) {
            $this->phoneNumber = $phoneNumber;
        }
    }
}
