<?php

namespace AAbutton\Esign\factory\account;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * 查询企业的1认证信息
 */
class GetOrgAuthInfo extends EsignRequest implements \JsonSerializable
{
    private $number;
    private $type;

    /**
     *  GetOrgAuthInfo constructor.
     * @param $number
     * @param $type
     */
    public function __construct($number,$type)
    {
        $this->number = $number;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    public function build()
    {
        $this->setUrl("/v3/organizations/identity-info?orgIDCardNum={$this->number}&orgIDCardType=CRED_ORG_USCC");
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
            if ($value == null || $key == 'number' || $key == 'type') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
