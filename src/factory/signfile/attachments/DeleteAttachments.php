<?php

namespace AAbutton\Esign\factory\signfile\attachements;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * API流程附件删除
 * @author  mcc7178
 * @date  2023/11/24 14:22
 */
class DeleteAttachments extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $fileIds;

    /**
     * DeleteAttachments constructor.
     * @param $flowId
     * @param $fileIds
     */
    public function __construct($flowId, $fileIds)
    {
        $this->flowId = $flowId;
        $this->fileIds = $fileIds;
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
     * @return DeleteAttachments
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileIds()
    {
        return $this->fileIds;
    }

    /**
     * @param mixed $fileIds
     * @return DeleteAttachments
     */
    public function setFileIds($fileIds)
    {
        $this->fileIds = $fileIds;
        return $this;
    }

    public function build()
    {
        $this->setUrl("/v1/signflows/".$this->flowId."/attachments?fileIds=".$this->fileIds);
        $this->setReqType(HttpEnum::DELETE);
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
            if ($value===null||$key=='flowId'||$key=='fileIds') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
