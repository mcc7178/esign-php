<?php

namespace AAbutton\Esign\factory\account;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * API查询个人账户（按照账户ID查询）
 * @author  mcc7178
 * @date  2023/11/20 10:46
 */
class QryPersonByaccountId extends EsignRequest implements \JsonSerializable
{
    private $accountId;

    /**
     * QryPersonByaccountId constructor.
     * @param $accountId
     */
    public function __construct($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }


    public function build()
    {
        $this->setUrl("/v1/accounts/" . $this->accountId);
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
            if ($value == null || $key == 'accountId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
