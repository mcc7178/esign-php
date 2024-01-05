<?php

namespace AAbutton\Esign\factory\signfile\documents;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * 搜索控件详情
 * @author  77
 * @date  2023/11/13 18:01
 */
class SearchButtonDetails extends EsignRequest implements \JsonSerializable
{
    private $templateId;

    /**
     * SearchDocuments constructor
     * @param $templateId
     */
    public function __construct($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    public function build()
    {
        $url = "/v3/doc-templates/" . $this->templateId;
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
            if ($value === null || $key == 'templateId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
