<?php

namespace AAbutton\Esign\factory\account;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * 查询个人认证信息
 */
class GetPersonalAuthInfo extends EsignRequest implements \JsonSerializable
{
    private $mobile;

    /**
     * QryPersonByaccountId constructor.
     * @param $mobile
     */
    public function __construct($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getIdnumber()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setIdnumber($mobile)
    {
        $this->mobile = $mobile;
    }


    public function build()
    {
        $this->setUrl("/v3/persons/identity-info?psnAccount=" . $this->mobile);
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
            if ($value == null || $key == 'mobile') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
