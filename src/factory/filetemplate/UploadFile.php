<?php

namespace AAbutton\Esign\factory\filetemplate;

use AAbutton\Esign\comm\HttpHelper;

/**
 * API文件流上传
 * @author  mcc7178
 * @date  2023/11/23 15:46
 */
class UploadFile
{
    private $filePath;
    private $contentType;
    private $url;

    /**
     * UploadFile constructor.
     * @param $filePath
     * @param $contentType
     * @param $url
     */
    public function __construct($filePath, $contentType, $url)
    {
        $this->filePath = $filePath;
        $this->contentType = $contentType;
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function execute()
    {
        return HttpHelper::upLoadFileHttp($this->url, $this->filePath, $this->contentType);
    }
}
