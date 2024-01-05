<?php

namespace AAbutton\Esign\factory\signfile\documents;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * 搜索关键字坐标
 * @author  77
 * @date  2023/11/13 18:01
 */
class SearchDocuments extends EsignRequest implements \JsonSerializable
{
    private $fileId;
    private $keywords;

    /**
     * SearchDocuments constructor
     * @param $fileId
     * @param $keywords
     */
    public function __construct($fileId, $keywords)
    {
        $this->fileId = $fileId;
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param mixed $fileId
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function build()
    {
        $url = "/v3/files/" . $this->fileId . "/keyword-positions?keywords=" . $this->keywords;
//        $url = "/v1/documents/" . $this->fileId . "/searchWordsPosition?keywords=" . urlencode($this->keywords);
//        $url = "/v3/files/" . $this->fileId . "/keyword-positions";
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
            if ($value === null || $key == 'fileId' || $key == 'keywords') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
