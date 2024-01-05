<?php

namespace AAbutton\Esign\factory\signfile\documents;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * 获取已完结合同的下载链接
 * @author  77
 * @date  2023/11/13 18:01
 */
class GetDownloadUrl extends EsignRequest implements \JsonSerializable
{
    private $templateId;

    /**
     * SearchDocuments constructor
     * @param $signFlowId
     */
    public function __construct($signFlowId)
    {
        $this->signFlowId = $signFlowId;
    }

    /**
     * @return mixed
     */
    public function getSignFlowId()
    {
        return $this->signFlowId;
    }

    /**
     * @param mixed $signFlowId
     */
    public function setSignFlowId($signFlowId)
    {
        $this->signFlowId = $signFlowId;
        return $this;
    }

    public function build()
    {
        $url = "/v3/sign-flow/" . $this->signFlowId . '/file-download-url';
        $this->setUrl($url);
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
            if ($value === null || $key == 'signFlowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
