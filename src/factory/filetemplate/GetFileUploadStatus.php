<?php

namespace AAbutton\Esign\factory\filetemplate;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * 查询文件上传状态
 * @author  77
 * @date  2023/11/13 18:00
 */
class GetFileUploadStatus extends EsignRequest implements \JsonSerializable
{
    private $fileId;

    /**
     * GetFileUploadStatus constructor.
     * @param $fileId
     */
    public function __construct($fileId)
    {
        $this->fileId = $fileId;
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
    }

    public function build()
    {
        $this->setUrl("/v1/files/" . $this->fileId . "/status");
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
            if ($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
