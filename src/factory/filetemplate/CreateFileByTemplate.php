<?php

namespace AAbutton\Esign\factory\filetemplate;

use AAbutton\Esign\enum\HttpEnum;
use AAbutton\Esign\factory\request\EsignRequest;

/**
 * API通过模板创建文件
 * @author  mcc7178
 * @date  2023/11/23 10:23
 */
class CreateFileByTemplate extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $templateId;
    private $simpleFormFields;

    /**
     * CreateFileByTemplate constructor.
     * @param $name
     * @param $templateId
     * @param $simpleFormFields
     */
    public function __construct($name, $templateId, $simpleFormFields)
    {
        $this->name = $name;
        $this->templateId = $templateId;
        $this->simpleFormFields = $simpleFormFields;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return mixed
     */
    public function getSimpleFormFields()
    {
        return $this->simpleFormFields;
    }

    /**
     * @param mixed $simpleFormFields
     */
    public function setSimpleFormFields($simpleFormFields)
    {
        $this->simpleFormFields = $simpleFormFields;
    }


    public function build()
    {
        $this->setUrl("/v1/files/createByTemplate");
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
            if ($value===null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
