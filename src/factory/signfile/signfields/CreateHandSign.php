<?php

namespace AAbutton\Esign\factory\signfile\signfields;

use AAbutton\Esign\factory\request\EsignRequest;
use AAbutton\Esign\enum\HttpEnum;

/**
 * API添加手动盖章签署区
 * @author  mcc7178
 * @date  2023/11/25 10:13
 */
class CreateHandSign extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $signfields;

    /**
     * CreateHandSign constructor.
     * @param $flowId
     * @param $signfields
     */
    public function __construct($flowId, array $signfields)
    {
        $this->flowId = $flowId;
        $this->signfields = $signfields;
    }

    /**
     * @return mixed
     */
    public function getFlowId()
    {
        return $this->flowId;
    }

    /**
     * @param mixed $flowId
     * @return CreateHandSign
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignfields()
    {
        return $this->signfields;
    }

    /**
     * @param mixed $signfields
     * @return CreateHandSign
     */
    public function setSignfields(array $signfields)
    {
        $this->signfields = $signfields;
        return $this;
    }

    public function build()
    {
        $this->setUrl("/v1/signflows/".$this->flowId."/signfields/handSign");
        $this->setReqType(HttpEnum::POST);
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
            if ($value===null||$key=='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
