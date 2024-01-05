<?php

namespace AAbutton\Esign\factory\signfile\signers;

use AAbutton\Esign\factory\request\EsignRequest;
use AAbutton\Esign\enum\HttpEnum;

/**
 * API流程签署人列表
 * @author  mcc7178
 * @date  2023/11/24 15:57
 */
class QrySigners extends EsignRequest
{
    private $flowId;

    /**
     * QrySigners constructor.
     * @param $flowId
     */
    public function __construct($flowId)
    {
        $this->flowId = $flowId;
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
     * @return QrySigners
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    public function build()
    {
        $this->setUrl("/v1/signflows/".$this->flowId."/signers");
        $this->setReqType(HttpEnum::GET);
    }
}
