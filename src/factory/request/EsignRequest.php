<?php

namespace AAbutton\Esign\factory\request;

use AAbutton\Esign\comm\HttpHelper;
use ReflectionClass;

/**
 * API请求类父类
 * @author  mcc7178
 * @date  2023/11/18 16:33
 */
abstract class EsignRequest
{
    private $reqType;
    private $url;

    public function execute()
    {
        try {
            $reflectionClass = new ReflectionClass($this);
        } catch (\ReflectionException $e) {
        }
        $build = $reflectionClass->getMethod("build");
        $build->invoke($this);
        $paramStr = json_encode($this, JSON_UNESCAPED_SLASHES);
        if ($paramStr == "[]") {
            $paramStr = '{}';
        }
        return HttpHelper::doCommHttp($this->reqType, $this->url, $paramStr);
    }

    /**
     * @return mixed
     */
    public function getReqType()
    {
        return $this->reqType;
    }

    /**
     * @param mixed $reqType
     */
    public function setReqType($reqType)
    {
        $this->reqType = $reqType;
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

    abstract public function build();
}
