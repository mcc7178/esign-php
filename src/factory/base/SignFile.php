<?php

namespace AAbutton\Esign\factory\base;

use AAbutton\Esign\factory\antfinsign\CheckAntfinNotary;
use AAbutton\Esign\factory\antfinsign\QrySignAntPushInfo;
use AAbutton\Esign\factory\filetemplate\GetFileUploadStatus;
use AAbutton\Esign\factory\signfile\documents\GetDownloadUrl;
use AAbutton\Esign\factory\signfile\documents\SearchDocuments;
use AAbutton\Esign\factory\signfile\attachements\CreateAttachments;
use AAbutton\Esign\factory\signfile\attachements\DeleteAttachments;
use AAbutton\Esign\factory\signfile\attachements\QryAttachments;
use AAbutton\Esign\factory\signfile\CreateFlowOneStep;
use AAbutton\Esign\factory\signfile\datasign\DataSign;
use AAbutton\Esign\factory\signfile\datasign\DataVerify;
use AAbutton\Esign\factory\signfile\documents\CreateDocuments;
use AAbutton\Esign\factory\signfile\documents\DeleteDocuments;
use AAbutton\Esign\factory\signfile\documents\DownDocuments;
use AAbutton\Esign\factory\signfile\pdfverify\PdfVerify;
use AAbutton\Esign\factory\signfile\signers\GetFileSignUrl;
use AAbutton\Esign\factory\signfile\signers\QrySigners;
use AAbutton\Esign\factory\signfile\signers\RushSign;
use AAbutton\Esign\factory\signfile\signfields\CreateAutoSign;
use AAbutton\Esign\factory\signfile\signfields\CreateHandSign;
use AAbutton\Esign\factory\signfile\signfields\CreatePlatformSign;
use AAbutton\Esign\factory\signfile\signfields\DeleteSignFields;
use AAbutton\Esign\factory\signfile\signfields\QrySignFields;
use AAbutton\Esign\factory\signfile\signflows\ArchiveSignFlow;
use AAbutton\Esign\factory\signfile\signflows\CreateSignFlow;
use AAbutton\Esign\factory\signfile\signflows\GetVoucherSignFlow;
use AAbutton\Esign\factory\signfile\signflows\QrySignFlow;
use AAbutton\Esign\factory\signfile\signflows\RevokeSignFlow;
use AAbutton\Esign\factory\signfile\signflows\StartSignFlow;
use AAbutton\Esign\factory\signfile\documents\SearchButtonDetails;

/**
 * API签署服务功能类
 * @author  mcc7178
 * @date  2023/11/20 15:18
 */
class SignFile
{
    /**
     * 核验签署文件上链信息
     * @param $docHash
     * @param $antTxHash
     * @return CheckAntfinNotary
     */
    public static function checkAntfinNotary($docHash, $antTxHash)
    {
        return new CheckAntfinNotary($docHash, $antTxHash);
    }

    /**
     * 查询签署文件上链信息
     * @param $flowId
     * @return QrySignAntPushInfo
     */
    public static function qrySignAntPushInfo($flowId)
    {
        return new QrySignAntPushInfo($flowId);
    }

    /**
     * 一步发起签署
     * @param $doc
     * @param $flowInfo
     * @param $signers
     * @return CreateFlowOneStep
     */
    public static function createFlowOneStep($doc, $flowInfo, $signers)
    {
        return new CreateFlowOneStep($doc, $flowInfo, $signers);
    }

    /**
     * 流程附件添加
     * @param $flowId
     * @param $attachments
     * @return CreateAttachments
     */
    public static function createAttachments($flowId, $attachments)
    {
        return new CreateAttachments($flowId, $attachments);
    }

    /**
     * 流程附件删除
     * @param $flowId
     * @param $fileIds
     * @return DeleteAttachments
     */
    public static function deleteAttachments($flowId, $fileIds)
    {
        return new DeleteAttachments($flowId, $fileIds);
    }

    /**
     * 流程附件列表
     * @param $flowId
     * @return QryAttachments
     */
    public static function qryAttachments($flowId)
    {
        return new QryAttachments($flowId);
    }

    /**
     * 平台方&平台用户文本签
     * @param $data
     * @param $type
     * @return DataSign
     */
    public static function dataSign($data, $type)
    {
        return new DataSign($data, $type);
    }

    /**
     * 文本签验签
     * @param $data
     * @param $signResult
     * @return DataVerify
     */
    public static function ataVerify($data, $signResult)
    {
        return new DataVerify($data, $signResult);
    }

    /**
     * 流程文档添加
     * @param $flowId
     * @param $docs
     * @return CreateDocuments
     */
    public static function createDocuments($flowId, $docs)
    {
        return new CreateDocuments($flowId, $docs);
    }

    /**
     * 流程文档删除
     * @param $flowId
     * @param $fileIds
     * @return DeleteDocuments
     */
    public static function deleteDocuments($flowId, $fileIds)
    {
        return new DeleteDocuments($flowId, $fileIds);
    }

    /**
     * 流程文档下载
     * @param $flowId
     * @return DownDocuments
     */
    public static function downDocuments($flowId)
    {
        return new DownDocuments($flowId);
    }

    /**
     * 搜索关键词坐标
     * @param $fileId
     * @param $keywords
     * @return SearchDocuments
     */
    public static function searchDocuments($fileId, $keywords)
    {
        return new SearchDocuments($fileId, $keywords);
    }

    /**
     * 文件验签
     * @param $fileId
     * @return PdfVerify
     */
    public static function pdfVerify($fileId)
    {
        return new PdfVerify($fileId);
    }

    /**
     * 获取签署地址
     * @param $flowId
     * @param $accountId
     * @return GetFileSignUrl
     */
    public static function getFileSignUrl($flowId, $accountId)
    {
        return new GetFileSignUrl($flowId, $accountId);
    }

    /**
     * 流程签署人列表
     * @param $flowId
     * @return QrySigners
     */
    public static function qrySigners($flowId)
    {
        return new QrySigners($flowId);
    }

    /**
     * 流程签署人催签
     * @param $flowId
     * @return RushSign
     */
    public static function rushSign($flowId)
    {
        return new RushSign($flowId);
    }

    /**
     * 添加签署方自动盖章签署区
     * @param $flowId
     * @param array $signfields
     * @return CreateAutoSign
     */
    public static function createAutoSign($flowId, array $signfields)
    {
        return new CreateAutoSign($flowId, $signfields);
    }

    /**
     * 添加手动盖章签署区
     * @param $flowId
     * @param array $signfields
     * @return CreateHandSign
     */
    public static function createHandSign($flowId, array $signfields)
    {
        return new CreateHandSign($flowId, $signfields);
    }

    /**
     * 添加平台自动盖章签署区
     * @param $flowId
     * @param array $signfields
     * @return CreatePlatformSign
     */
    public static function createPlatformSign($flowId, array $signfields)
    {
        return new CreatePlatformSign($flowId, $signfields);
    }

    /**
     * 删除签署区
     * @param $flowId
     * @param $signfieldIds
     * @return DeleteSignFields
     */
    public static function deleteSignFields($flowId, $signfieldIds)
    {
        return new DeleteSignFields($flowId, $signfieldIds);
    }

    /**
     * 查询签署区列表
     * @param $flowId
     * @return QrySignFields
     */
    public static function qrySignFields($flowId)
    {
        return new QrySignFields($flowId);
    }

    /**
     * 签署流程归档
     * @param $flowId
     * @return ArchiveSignFlow
     */
    public static function archiveSignFlow($flowId)
    {
        return new ArchiveSignFlow($flowId);
    }

    /**
     * 签署流程创建
     * @param $businessScene
     * @return CreateSignFlow
     */
    public static function createSignFlow($businessScene)
    {
        return new CreateSignFlow($businessScene);
    }

    /**
     * 流程签署数据存储凭据
     * @param $flowId
     * @return GetVoucherSignFlow
     */
    public static function getVoucherSignFlow($flowId)
    {
        return new GetVoucherSignFlow($flowId);
    }

    /**
     * 签署流程查询
     * @param $flowId
     * @return QrySignFlow
     */
    public static function qrySignFlow($flowId)
    {
        return new QrySignFlow($flowId);
    }

    /**
     * 签署流程撤销
     * @param $flowId
     * @return RevokeSignFlow
     */
    public static function revokeSignFlow($flowId)
    {
        return new RevokeSignFlow($flowId);
    }

    /**
     * 签署流程开启
     * @param $flowId
     * @return StartSignFlow
     */
    public static function startSignFlow($flowId)
    {
        return new StartSignFlow($flowId);
    }


    /**
     * 查询合同模板中控件详情
     * @param $templateId
     * @return SearchButtonDetails
     */
    public static function searchButtonDetails($templateId)
    {
        return new SearchButtonDetails($templateId);
    }

    /**
     * 查询合同模板中控件详情
     * @param $flowId
     * @return GetDownloadUrl
     */
    public static function getDownloadUrl($flowId)
    {
        return new GetDownloadUrl($flowId);
    }
}
