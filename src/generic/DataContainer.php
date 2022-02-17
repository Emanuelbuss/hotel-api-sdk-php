<?php

/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/7/2015
 * Time: 1:50 PM
 */

namespace hotelbeds\hotel_api_sdk\generic;

/**
 * Class DataContainer This is a generic data container. Used for messages and model data classes, can contains set of
 * keys. Can get and set magically with magic methods.
 * @package hotelbeds\hotel_api_sdk\generic
 */
abstract class DataContainer implements \JsonSerializable
{
    /**
     * @var string[] Array of valid fields of container and its types
     */
    protected array $validFields = [];

    /**
     * @var array<string,mixed> Array of data of all valid fields.
     */
    protected array $fields = [];

    public function __isset(string $field): bool
    {
        return isset($this->fields[$field]);
    }

    /**
     * Setter magical method
     * @param string $field Name of field
     * @param mixed $value Value of field
     * @throws FieldNotValid Rise if field is not defined into validFields.
     * @throws \Exception Rise of general exception same as defined field type is incorrect.
     */
    public function __set(string $field, $value): void
    {
        if (!empty($this->validFields) && !array_key_exists($field, $this->validFields)) {
            throw new FieldNotValid("$field not valid for this model");
        }

        $type = $this->validFields[$field];

        if (empty($type)) {
            $this->fields[$field] = $value;
        }

        if (is_object($value)) {
            if (get_class($value) !== $type) {
                throw new \Exception("Type error: Field {$field} needs {$type} class type: " . get_class($value));
            }

            if (!is_a($value, $type)) {
                throw new \Exception("Type error: Field {$field} needs {$type} class type!");
            }
        } elseif (gettype($value) !== $type) {
            throw new \Exception("Type error: Field {$field} needs {$type} type!");
        }

        $this->fields[$field] = $value;
    }

    /**
     * Getter magical method
     * @param string $field Field name
     * @return mixed Return a value of field
     * @throws FieldNotValid If field does exists
     */
    public function __get(string $field)
    {
        if (!empty($this->validFields) && !array_key_exists($field, $this->validFields)) {
            throw new FieldNotValid("{$field} not valid for this model");
        }

        return $this->fields[$field] ?? null;
    }

    /**
     * Transform data fields into PHP-array structure
     *
     * @return array<int|string,mixed> Data fields array structure
     */
    public function toArray(): array
    {
        return array_map(static function ($item) {
            if (is_object($item) && get_class($item) === \DateTime::class) {
                return $item->format('Y-m-d');
            }

            if ($item instanceof DataContainer) {
                return $item->toArray();
            }

            if (is_array($item)) {
                return array_map(static function ($subItem) {
                    if ($subItem instanceof DataContainer) {
                        return $subItem->toArray();
                    }
                    return $subItem;
                }, $item);
            }

            return $item;
        }, $this->fields);
    }

    public function jsonSerialize()
    {
        return $this->fields;
    }
}
