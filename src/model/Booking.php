<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/24/2015
 * Time: 12:14 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Booking
 * @package hotelbeds\hotel_api_sdk\model
 */
class Booking extends ApiModel
{
    /**
     * Booking constructor.
     * @param array<string,double|string|array<string,string|bool>|array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            'reference' => 'string',
            'cancellationReference' => 'string',
            'clientReference' => 'string',
            // array<string, bool> keys: cancellation, modification
            'modificationPolicies' => 'array',
            'creationDate' => 'string',
            'creationUser' => 'string',
            'totalNet' => 'double',
            'totalSellingRate' => 'double',
            'pendingAmount' => 'double',
            'currency' => 'string',
            'status' => 'string',
            // array<string,string> key: name, surname {@see Holder}
            'holder' => 'array',
            'commisionVAT' => 'double',
            'agCommision' => 'double',
            'remark' => 'string',
            // array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>>
            'hotel' => 'array',
            // array<string,string> key: registrationNumber, code, name
            'invoiceCompany' => 'array',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }
}
