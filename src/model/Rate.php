<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/8/2015
 * Time: 1:41 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Rate
 * @package hotelbeds\hotel_api_sdk\model
 * @property string $rateKey Internal rate key to be used for confirmation
 * @property string $rateClass Internal rate class type(NOR  NRF, SPE,OFE, PAQ ...)
 * @property string $rateType If the booking can be confirmed in two steps (BOOKABLE) or three steps (RECHECK)
 * @property double $net Room net price
 * @property double $sellingRate Room gross price in case it is informed
 * @property integer $allotment Number of rooms available for a particular room type use
 * @property double $comission Comission for comissionable model
 * @property double $comissionVAT Vat comission
 * @property double $comissionPCT Percentage of the comission
 * @property string $rateCommentsId Rate comment id. Using the commentContract function a description is returned
 * @property array $rateComments List of rate comments
 * @property string $paymentType To identify if it is pay at hotel or merchant
 * @property boolean $packaging Identifies if the rate is for packaging
 * @property string $boardCode Internal board code
 * @property string $boardName Board name
 * @property double $hotelSellingRate Room gross price in hotelCurrency  (for pay at hotel model)
 * @property string $hotelCurrency Hotel currency  (for pay at hotel model)
 * @property boolean $hotelMandatory Identifies if the rate price is recommended
 * @property integer $rooms Number of rooms requested with the same occupancy
 * @property integer $adults Number of adults for the room
 * @property integer $children Number of children requested
 * @property string $childrenAges Children ages separated by commas
 * @property ?array<array<string,double|string>> $cancellationPolicies List of cancellation policies
 * @property array<array<string,boolean|double|string>> $taxes List of taxes
 * @property ?array<array<string,string>> $promotions List of promotions
 * @property ?array<array<string,double|integer>> $dailyRates List of daily rates
 * @property array $rateBreakDown+
 * @property array $shiftRates
 * @property array $offers
 * @property double $rateup
 */
class Rate extends ApiModel
{
    /**
     * @param ?array<string,mixed> $data TODO
     */
    public function __construct(array $data = null)
    {
        // TODO: Falten camps per afegir: shifts

        $this->validFields = [
            'rateKey' => 'string',
            'rateClass' => 'string',
            'rateType' => 'string',
            'net' => 'double',
            'sellingRate' => 'double',
            'allotment' => 'integer',
            'comission' => 'double',
            'comissionVAT' => 'double',
            'comissionPCT' => 'double',
            'rateCommentsId' => 'string',
            'rateComments' => 'string',
            // TODO
            'voucherComments' => 'array',
            'paymentType' => 'string',
            'packaging' => 'boolean',
            // TODO
            'rateBreakDown' => 'array',
            'boardCode' => 'string',
            // TODO
            'offers' => 'array',
            // TODO
            'shiftRates' => 'array',
            'rateup' => 'double',
            'boardName' => 'string',
            'hotelSellingRate' => 'double',
            'hotelCurrency' => 'string',
            'hotelMandatory' => 'boolean',
            'rooms' => 'integer',
            'adults' => 'integer',
            'children' => 'integer',
            'childrenAges' => 'string',
            // array<array<string,double|string>> cancellationPolicies
            'cancellationPolicies' => 'array',
            // array<array<string,boolean|double|string>> taxes
            'taxes' => 'array',
            // array<array<string,string>> promotions
            'promotions' => 'array',
            // array<array<string,double|integer>> dailyRates
            'dailyRates' => 'array',
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }

    /**
     * Get cancellation policies iterator for iterate all policies with models classes
     *
     * @return CancellationPoliciesIterator Return cancellation policies iterator
     */
    public function cancellationPoliciesIterator(): CancellationPoliciesIterator
    {
        return new CancellationPoliciesIterator($this->cancellationPolicies ?? []);
    }

    /**
     * Get dailyrates iterator for iterate all daily rates with models classes
     *
     * @return DailyRatesIterator Return daily rates iterator
     */
    public function dailyRatesIterator(): DailyRatesIterator
    {
        return new DailyRatesIterator($this->dailyRates ?? []);
    }

    /**
     * @return Taxes Return taxes class and list of all taxes
     */
    public function getTaxes(): Taxes
    {
        return new Taxes($this->taxes);
    }

    /**
     * @return PromotionsIterator
     */
    public function promotionsIterator(): PromotionsIterator
    {
        return new PromotionsIterator($this->promotions ?? []);
    }
}
