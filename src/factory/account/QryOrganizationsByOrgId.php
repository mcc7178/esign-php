<?php

namespace AAbutton\Esign\factory\account;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * API查询机构账号（按照账号ID查询）
 * @author  mcc7178
 * @date  2023/11/19 17:54
 */
class QryOrganizationsByOrgId extends EsignRequest implements \JsonSerializable
{
    private $orgId;

    /**
     * QryOrganizationsByOrgId constructor.
     * @param $orgId
     */
    public function __construct($orgId)
    {
        $this->orgId = $orgId;
    }

    /**
     * @return mixed
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param mixed $orgId
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    public function build()
    {
        $this->setUrl("/v1/organizations/" . $this->orgId);
        $this->setReqType(HttpEnum::GET);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if ($value == null || $key == 'orgId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
