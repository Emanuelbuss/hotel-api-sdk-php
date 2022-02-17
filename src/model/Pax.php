<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/5/2015
 * Time: 12:20 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Pax. Declare passenger data.
 * @package hotelbeds\hotel_api_sdk\model
 * @property integer $roomId
 * @property string $type Pax type. Two values are permitted for the attribute: AD for adult y CH
 * @property integer $age
 * @property string $name
 * @property string $surname
 */
class Pax extends ApiModel
{
    public const AD = 'AD';
    public const CH = 'CH';

    /**
     * Pax constructor.
     * @param string $type Type of passenger: AD or CH
     * @param int $age Age of passenger
     * @param string|null $name Name of passenger
     * @param string|null $surname Surname
     * @param int|null $roomId Room ID
     */
    public function __construct(
        string $type = self::AD,
        int $age = 30,
        ?string $name = null,
        ?string $surname = null,
        ?int $roomId = null
    )
    {
        $this->validFields = [
            'roomId' => 'integer',
            'type' => 'string',
            'age' => 'integer',
            'name' => 'string',
            'surname' => 'string',
        ];

        $this->age = $age;
        $this->type = $type;
        if ($roomId !== null) {
            $this->roomId = $roomId;
        }

        if ($name !== null) {
            $this->name = $name;
        }

        if ($surname !== null) {
            $this->surname = $surname;
        }
    }

    /**
     * @param array<string,integer|string> $data
     * @return Pax
     */
    public static function load(array $data): Pax
    {
        return new self(
            $data['type'] ?? null,
            $data['age'] ?? null,
            $data['name'] ?? null,
            $data['surname'] ?? null,
            $data['roomId'] ?? null,
        );
    }
}
