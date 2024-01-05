<?php

namespace AAbutton\Esign\factory\base;

use AAbutton\Esign\factory\account\GetOrgAuthInfo;
use AAbutton\Esign\factory\account\GetPersonalAuth;
use AAbutton\Esign\factory\account\GetPersonalAuthInfo;
use AAbutton\Esign\factory\account\CreateOrganizationsByThirdPartyUserId;
use AAbutton\Esign\factory\account\CreatePersonByThirdPartyUserId;
use AAbutton\Esign\factory\account\DeleteOrganizationsByOrgId;
use AAbutton\Esign\factory\account\DeleteOrganizationsByThirdId;
use AAbutton\Esign\factory\account\DeletePersonByAccountId;
use AAbutton\Esign\factory\account\DeletePersonByThirdId;
use AAbutton\Esign\factory\account\DeleteSignAuth;
use AAbutton\Esign\factory\account\QryOrganizationsByOrgId;
use AAbutton\Esign\factory\account\QryOrganizationsByThirdId;
use AAbutton\Esign\factory\account\QryPersonByaccountId;
use AAbutton\Esign\factory\account\QryPersonByThirdId;
use AAbutton\Esign\factory\account\SetSignAuth;
use AAbutton\Esign\factory\account\SetSignPwd;
use AAbutton\Esign\factory\account\UpdateOrganizationsByOrgId;
use AAbutton\Esign\factory\account\UpdateOrganizationsByThirdId;
use AAbutton\Esign\factory\account\UpdatePersonAccountByAccountId;
use AAbutton\Esign\factory\account\UpdatePersonAccountByThirdId;

/**
 * API账号相关功能类
 * @author  mcc7178
 * @date  2023/11/19 14:12
 */
class Account
{
    /**
     * 个人账号创建
     * @param $thirdPartyUserId
     * @param $name
     * @param $idType
     * @param $idNumber
     * @return CreatePersonByThirdPartyUserId
     */
    public static function createPersonByThirdPartyUserId($thirdPartyUserId, $name, $idType, $idNumber)
    {
        return new CreatePersonByThirdPartyUserId($thirdPartyUserId, $name, $idType, $idNumber);
    }

    /**
     * 机构账号创建
     * @param $thirdPartyUserId
     * @param $creator
     * @param $name
     * @param $idType
     * @param $idNumber
     * @return CreateOrganizationsByThirdPartyUserId
     */
    public static function createOrganizationsByThirdPartyUserId($thirdPartyUserId, $creator, $name, $idType, $idNumber)
    {
        return new CreateOrganizationsByThirdPartyUserId($thirdPartyUserId, $creator, $name, $idType, $idNumber);
    }

    /**
     * 注销机构账号（按照账号ID注销）
     * @param $orgId
     * @return DeleteOrganizationsByOrgId
     */
    public static function deleteOrganizationsByOrgId($orgId)
    {
        return new DeleteOrganizationsByOrgId($orgId);
    }

    /**
     * 注销机构账号（按照第三方机构ID注销）
     * @param $thirdPartyUserId
     * @return DeleteOrganizationsByThirdId
     */
    public static function deleteOrganizationsByThirdId($thirdPartyUserId)
    {
        return new DeleteOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 注销个人账户（按照账号ID注销）
     * @param $accountId
     * @return DeletePersonByAccountId
     */
    public static function deletePersonByAccountId($accountId)
    {
        return new DeletePersonByAccountId($accountId);
    }

    /**
     * 注销个人账户（按照第三方用户ID注销）
     * @param $thirdPartyUserId
     * @return DeletePersonByThirdId
     */
    public static function deletePersonByThirdId($thirdPartyUserId)
    {
        return new DeletePersonByThirdId($thirdPartyUserId);
    }

    /**
     * 撤销静默签署
     * @param $accountId
     * @return DeleteSignAuth
     */
    public static function deleteSignAuth($accountId)
    {
        return new DeleteSignAuth($accountId);
    }

    /**
     * 查询机构账号（按照账号ID查询）
     * @param $orgId
     * @return QryOrganizationsByOrgId
     */
    public static function qryOrganizationsByOrgId($orgId)
    {
        return new QryOrganizationsByOrgId($orgId);
    }

    /**
     * 查询机构账号（按照第三方机构ID查询）
     * @param $thirdPartyUserId
     * @return QryOrganizationsByThirdId
     */
    public static function qryOrganizationsByThirdId($thirdPartyUserId)
    {
        return new QryOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 查询机构账号（按照账号ID查询）
     * @param $accountId
     * @return QryPersonByaccountId
     */
    public static function qryPersonByaccountId($accountId)
    {
        return new QryPersonByaccountId($accountId);
    }

    /**
     * 查询个人账户（按照第三方用户ID查询）
     * @param $thirdPartyUserId
     * @return QryPersonByThirdId
     */
    public static function qryPersonByThirdId($thirdPartyUserId)
    {
        return new QryPersonByThirdId($thirdPartyUserId);
    }

    /**
     * 设置静默签署
     * @param $accountId
     * @return SetSignAuth
     */
    public static function setSignAuth($accountId)
    {
        return new SetSignAuth($accountId);
    }

    /**
     * 设置签署密码
     * @param $accountId
     * @param $password
     * @return SetSignPwd
     */
    public static function setSignPwd($accountId, $password)
    {
        return new SetSignPwd($accountId, $password);
    }

    /**
     * 机构账号修改（按照账号ID修改）
     * @param $orgId
     * @return UpdateOrganizationsByOrgId
     */
    public static function updateOrganizationsByOrgId($orgId)
    {
        return new UpdateOrganizationsByOrgId($orgId);
    }

    /**
     * 机构账号修改（按照第三方机构ID修改）
     * @param $thirdPartyUserId
     * @return UpdateOrganizationsByThirdId
     */
    public static function updateOrganizationsByThirdId($thirdPartyUserId)
    {
        return new UpdateOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 个人账户修改(按照账号ID修改)
     * @param $accountId
     * @return UpdatePersonAccountByAccountId
     */
    public static function updatePersonAccountByAccountId($accountId)
    {
        return new UpdatePersonAccountByAccountId($accountId);
    }

    /**
     * 个人账户修改(按照第三方用户ID修改)
     * @param $thirdPartyUserId
     * @return UpdatePersonAccountByThirdId
     */
    public static function updatePersonAccountByThirdId($thirdPartyUserId)
    {
        return new UpdatePersonAccountByThirdId($thirdPartyUserId);
    }

    /**
     * 查询个人认证信息
     * @param $mobile
     * @return GetPersonalAuthInfo
     */
    public static function getPersonalAuthInfo($mobile)
    {
        return new GetPersonalAuthInfo($mobile);
    }

    /**
     * 查询企业1的认证信息
     * @param $number
     * @param $type
     * @return GetOrgAuthInfo
     */
    public static function getOrgAuthInfo($number,$type)
    {
        return new GetOrgAuthInfo($number,$type);
    }
}
