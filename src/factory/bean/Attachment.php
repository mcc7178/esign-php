<?php

namespace AAbutton\Esign\factory\bean;

/**
 * API一步发起签署-attachment参数
 * @author  mcc7178
 * @date  2023/11/24 13:57
 */
class Attachment implements \JsonSerializable
{
    private $fileId;
    private $attachmentName;

    public function __construct()
    {
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
    public function getAttachmentName()
    {
        return $this->attachmentName;
    }

    /**
     * @param mixed $attachmentName
     */
    public function setAttachmentName($attachmentName)
    {
        $this->attachmentName = $attachmentName;
        return $this;
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
