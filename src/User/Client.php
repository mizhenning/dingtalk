<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\User;

use EasyDingTalk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取用户详情
     *
     * @param string $userid
     * @param string|null $lang
     *
     * @return mixed
     */
    public function get($userid, $language = 'zh_CN')
    {
        return $this->client->postJson('topapi/v2/user/get', compact('userid', 'language'));
    }

    /**
     * 获取部门用户 Userid 列表
     *
     * @param int $departmentId
     *
     * @return mixed
     */
    public function getUserIds($departmentId)
    {
        return $this->client->postJson('topapi/user/listid', ['dept_id' => $departmentId]);
    }

    /**
     * 获取部门用户
     *
     * @param int $departmentId
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     *
     * @return mixed
     */
    public function getUsers($departmentId, $offset, $size = 10, $order = null, $contain_access_limit = false, $lang = null)
    {
        return $this->client->postJson('topapi/user/listsimple', [
            'dept_id' => $departmentId, 'cursor' => $offset, 'size' => $size, 'order_field' => $order, 'contain_access_limit' => $contain_access_limit, 'lang' => $lang,
        ]);
    }

    /**
     * 获取部门用户详情
     *
     * @param int $departmentId
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     *
     * @return mixed
     */
    public function getDetailedUsers($departmentId, $offset, $size = 10, $order = null, $contain_access_limit = false, $lang = null)
    {
        return $this->client->postJson('topapi/v2/user/list', [
            'dept_id' => $departmentId, 'cursor' => $offset, 'size' => $size, 'order_field' => $order, 'contain_access_limit' => $contain_access_limit, 'lang' => $lang,
        ]);
    }

    /**
     * 获取管理员列表
     *
     * @return mixed
     */
    public function administrators()
    {
        return $this->client->post('topapi/user/listadmin');
    }

    /**
     * 获取管理员通讯录权限范围
     *
     * @param string $userid
     *
     * @return mixed
     */
    public function administratorScope($userid)
    {
        return $this->client->post('topapi/user/get_admin_scope', compact('userid'));
    }

    /**
     * 根据 Unionid 获取 Userid
     *
     * @param string $unionid
     *
     * @return mixed
     */
    public function getUseridByUnionid($unionid)
    {
        return $this->client->postJson('topapi/user/getbyunionid', compact('unionid'));
    }

    /**
     * 创建用户
     *
     * @param array $params
     *
     * @return mixed
     */
    public function create(array $params)
    {
        return $this->client->postJson('topapi/v2/user/create', $params);
    }

    /**
     * 更新用户
     *
     * @param string $userid
     * @param array $params
     *
     * @return mixed
     */
    public function update($userid, array $params)
    {
        return $this->client->postJson('topapi/v2/user/update', compact('userid') + $params);
    }

    /**
     * 删除用户
     *
     * @param $userid
     *
     * @return mixed
     */
    public function delete($userid)
    {
        return $this->client->postJson('topapi/v2/user/delete', compact('userid'));
    }

    /**
     * 企业内部应用免登获取用户 Userid
     *
     * @param string $code
     *
     * @return mixed
     */
    public function getUserByCode($code)
    {
        return $this->client->postJson('topapi/v2/user/getuserinfo', compact('code'));
    }

    /**
     * 批量增加员工角色
     *
     * @param array|string $userIds
     * @param array|string $roleIds
     *
     * @return mixed
     */
    public function addRoles($userIds, $roleIds)
    {
        $userIds = is_array($userIds) ? implode(',', $userIds) : $userIds;
        $roleIds = is_array($roleIds) ? implode(',', $roleIds) : $roleIds;

        return $this->client->postJson('topapi/role/addrolesforemps', compact('userIds', 'roleIds'));
    }

    /**
     * 批量删除员工角色
     *
     * @param array|string $userIds
     * @param array|string $roleIds
     *
     * @return mixed
     */
    public function removeRoles($userIds, $roleIds)
    {
        $userIds = is_array($userIds) ? implode(',', $userIds) : $userIds;
        $roleIds = is_array($roleIds) ? implode(',', $roleIds) : $roleIds;

        return $this->client->postJson('topapi/role/removerolesforemps', compact('userIds', 'roleIds'));
    }

    /**
     * 获取企业员工人数
     *
     * @param int $only_active
     *
     * @return mixed
     */
    public function getCount($only_active = false)
    {
        return $this->client->postJson('topapi/user/count', compact('only_active'));
    }

    /**
     * 获取企业已激活的员工人数
     *
     * @return mixed
     */
    public function getActivatedCount()
    {
        return $this->getCount(true);
    }

    /**
     * 根据员工手机号获取 Userid
     *
     * @param string $mobile
     *
     * @return mixed
     */
    public function getUserIdByPhone($mobile = '')
    {
        return $this->client->postJson('topapi/v2/user/getbymobile', compact('mobile'));
    }

    /**
     * 未登录钉钉的员工列表
     *
     * @param string $query_date
     * @param int $offset
     * @param int $size
     *
     * @return mixed
     */
    public function getInactiveUsers($query_date, $offset, $size, $is_active = false, $dept_ids = null)
    {
        return $this->client->postJson('topapi/inactive/user/v2/get', [
            'query_date' => $query_date, 'offset' => $offset, 'size' => $size, 'is_active' => false, 'dept_ids' => $dept_ids
        ]);
    }
}
