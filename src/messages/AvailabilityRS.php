<?php
/**
 * #%L
 * hotel-api-sdk
 * %%
 * Copyright (C) 2015 HOTELBEDS, S.L.U.
 * %%
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 2.1 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Lesser Public License for more details.
 *
 * You should have received a copy of the GNU General Lesser Public
 * License along with this program.  If not, see
 * <http://www.gnu.org/licenses/lgpl-2.1.html>.
 * #L%
 */

namespace hotelbeds\hotel_api_sdk\messages;

use hotelbeds\hotel_api_sdk\model\AuditData;
use hotelbeds\hotel_api_sdk\model\Hotels;

/**
 * Class AvailabilityRS
 * @package hotelbeds\hotel_api_sdk\messages
 * @property AuditData $auditData Relevant internal information
 * @property Hotels $hotels List of available hotels
 */

class AvailabilityRS extends ApiResponse
{
    public function __construct(array $rsData)
    {
        parent::__construct($rsData);
        if (array_key_exists("hotels", $rsData)) {
            $hotelsObject = new Hotels($this->hotels);
            $this->hotels = $hotelsObject;
        }
    }

    /**
     * @return bool Returns True when response hotels list is empty. False otherwise.
     */
    public function isEmpty()
    {
        return ($this->hotels->total === 0);
    }

    /**
     * @return AuditData Return class of audit
     */
    public function auditData()
    {
        return new AuditData($this->auditData);
    }
}