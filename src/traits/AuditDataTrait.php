<?php

namespace hotelbeds\hotel_api_sdk\traits;

use hotelbeds\hotel_api_sdk\messages\FieldNotExists;
use hotelbeds\hotel_api_sdk\model\AuditData;

trait AuditDataTrait
{
    /**
     * Returns an auditdata object with response auditdata
     * @return AuditData Return class of audit
     * @throws FieldNotExists
     */
    public function auditData()
    {
        return new AuditData($this->__get('auditData'));
    }

    abstract public function __get(string $filed);
}
