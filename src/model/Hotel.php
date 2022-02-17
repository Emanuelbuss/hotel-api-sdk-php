<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/8/2015
 * Time: 12:48 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

use Exception;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

/**
 * Class Hotel
 * @package hotelbeds\hotel_api_sdk\model
 * @property integer $code Hotelbeds internal hotel code
 * @property string $name Hotel name
 * @property string $address Hotel address
 * @property string $categoryCode Hotel category code
 * @property string $categoryName Category name
 * @property string $destinationCode Code of the destination where the hotel is located
 * @property string $destinationName Name of the destination where the hotel is located
 * @property integer $zoneCode Code of the zone where the hotel is located
 * @property string $zoneName Name of the zone where the hotel is located
 * @property double $latitude Hotel geo latitude
 * @property double $longitude Hotel geo longitude
 * @property ?array<array<string,integer|string|array<string,integer|string>|array<array<string,mixed>>>> $rooms
 *     List of rooms available for a particular hotel
 * @property string $currency Client currency
 * @property double $maxRate Maximum hotel room price
 * @property double $minRate Minimum hotel room price
 * @property string $giata Giata hotel code
 * @property double $totalSellingRate
 * @property double $totalNet
 * @property ?array<array<string,string>> $creditCards List of creditCards available for a particular hotel
 * @property \DateTime $checkIn check in date
 * @property \DateTime $checkOut check out date
 * @property integer $exclusiveDeal
 * @property array<array<string,int>> $keyword
 * @property array<array<string,double|int|string>> $reviews
 * @property double $pendingAmount
 * @property array<string,string> $supplier
 * @property string $clientComments
 * @property double $cancellationAmount
 * @property array<string,array<array<string,mixed>>> $upselling
 * @property boolean $isPaymentDataRequired
 * @template-implements \IteratorAggregate<int,Room>
 */
class Hotel extends ApiModel implements \IteratorAggregate
{
    /**
     * @param ?array<\DateTime|integer|string|double|bool|array<string,string>|array<array<string,double|integer|string|array<string,integer|string>|array<array<string,mixed>>>>> $data
     */
    public function __construct(array $data = null)
    {
        $this->validFields = [
            'code' => 'integer',
            'checkIn' => 'DateTime',
            'checkOut' => 'DateTime',
            'name' => 'string',
            'exclusiveDeal' => 'integer',
            'address' => 'string',
            'categoryCode' => 'string',
            'categoryName' => 'string',
            'destinationCode' => 'string',
            'destinationName' => 'string',
            'zoneCode' => 'integer',
            'zoneName' => 'string',
            'latitude' => 'double',
            'longitude' => 'double',
            // array<array<string,integer|string|array<string,integer|string>|array<array<string,mixed>>>>
            'rooms' => 'array',
            'totalSellingRate' => 'double',
            'totalNet' => 'double',
            'currency' => 'string',
            // array<string,string> key: name, vatNumber
            'supplier' => 'array',
            'maxRate' => 'double',
            'minRate' => 'double',
            'giata' => 'string',
            // array<array<string,int>> key: code, rating
            'keyword' => 'array',
            // array<array<string,double|int|string>> key: rate, reviewCount, type
            'reviews' => 'array',
            'pendingAmount' => 'double',
            'clientComments' => 'string',
            'cancellationAmount' => 'double',
            // array<string,array<array<string,mixed>>>
            'upselling' => 'array',
            'isPaymentDataRequired' => 'boolean',
            // array<array<string,string>> creditCards
            'creditCards' => 'array',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }

    /**
     * @deprecated use {@see getIterator}
     */
    public function iterator(): RoomIterator
    {
        return new RoomIterator($this->rooms ?? []);
    }

    /**
     * @return RoomIterator Iterate all rooms of this hotel
     */
    public function getIterator(): RoomIterator
    {
        return new RoomIterator($this->rooms ?? []);
    }

    /**
     * @return CreditCardIterator For iterate creditCard list
     */
    public function creditCardsIterator(): CreditCardIterator
    {
        return new CreditCardIterator($this->creditCards ?? []);
    }
}
