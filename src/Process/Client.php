<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Process;

use EasyDingTalk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 发起审批实例
     *
     * @param array $params
     *
     * @return mixed
     */
    public function create($params)
    {
        return $this->client->postJson('topapi/processinstance/create', $params);
    }

    /**
     * 撤销审批实例
     *
     * @param array $params
     * https://open.dingtalk.com/document/orgapp-server/terminate-a-workflow-by-using-an-instance-id
     * @return mixed
     */
    public function terminate($params)
    {
        return $this->client->postJson('topapi/process/instance/terminate', ['request' => $params]);
    }

    /**
     * 更新审批实例状态
     *
     * @param array $params
     * https://open.dingtalk.com/document/orgapp-server/to-do-instance-status
     * @return mixed
     */
    public function update($params)
    {
        return $this->client->postJson('topapi/process/workrecord/update', ['request' => $params]);
    }

    /**
     * 批量获取审批实例 ID
     *
     * @param array $params
     *
     * @return mixed
     */
    public function getIds($params)
    {
        return $this->client->postJson('topapi/processinstance/listids', $params);
    }

    /**
     * 获取单个审批实例
     *
     * @param string $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->client->postJson('topapi/processinstance/get', ['process_instance_id' => $id]);
    }

    /**
     * 创建或更新审批模板
     *
     * @param array $params
     *
     * @return mixed
     */
    public function save($params)
    {
        return $this->client->postJson('topapi/process/save', ['saveProcessRequest' => $params]);
    }

    /**
     * 删除审批模板
     *
     * @param array $params
     *
     * @return mixed
     */
    public function delete($params)
    {
        return $this->client->postJson('topapi/process/delete', ['request' => $params]);
    }

    /**
     * 获取审批模板code
     *
     * @param array $name
     *
     * @return mixed
     */
    public function getCode($name)
    {
        return $this->client->postJson('topapi/process/get_by_name', ['name' => $name]);
    }

    /**
     * 获取用户待审批数量
     *
     * @param string $userId
     *
     * @return mixed
     */
    public function count($userId)
    {
        return $this->client->postJson('topapi/process/gettodonum', ['userid' => $userId]);
    }

    /**
     * 获取用户可见的审批模板
     *
     * @param string|null $userId
     * @param int         $offset
     * @param int         $size
     *
     * @return mixed
     */
    public function listByUserId($userId = null, $offset = 0, $size = 100)
    {
        return $this->client->postJson('topapi/process/listbyuserid', ['userid' => $userId, 'offset' => $offset, 'size' => $size]);
    }

    /**
     * 下载审批附件
     * https://open.dingtalk.com/document/orgapp-server/grants-the-permission-to-download-the-approval-file
     * @param array $params
     *
     * @return mixed
     */
    public function fileUrlGet($params)
    {
        return $this->client->postJson('topapi/processinstance/file/url/get', ['request' => $params]);
    }

    /**
     * 同意或拒绝审批任务
     * https://open.dingtalk.com/document/orgapp-server/execute-approval-operation-with-attachment
     * @param array $params
     *
     * @return mixed
     */
    public function execute($params)
    {
        return $this->client->postJson('topapi/process/instance/execute', ['request' => $params]);
    }

    /**
     * 添加评论
     * https://open.dingtalk.com/document/orgapp-server/add-an-approval-comment
     * @param array $params
     *
     * @return mixed
     */
    public function commentAdd($params)
    {
        return $this->client->postJson('topapi/process/instance/comment/add', ['request' => $params]);
    }

    /**
     * 获取审批钉盘空间信息
     * https://open.dingtalk.com/document/orgapp-server/query-the-space-of-an-approval-nail
     * @param array $params
     *
     * @return mixed
     */
    public function cspaceInfo($params)
    {
        return $this->client->postJson('topapi/processinstance/cspace/info', $params);
    }

    /**
     * 授权用户访问企业的自定义空间
     * https://open.dingtalk.com/document/orgapp-server/authorize-a-user-to-access-a-custom-workspace-of-an
     * @param array $params
     *
     * @return mixed
     */
    public function grantCustomSpace($params)
    {
        return $this->client->get('cspace/grant_custom_space', $params);
    }

    /**
     * 授权预览审批附件
     * https://open.dingtalk.com/document/isvapp-server/preview-authorization-attachment
     * @param array $params
     *
     * @return mixed
     */
    public function cspacePreview($params)
    {
        return $this->client->postJson('topapi/processinstance/cspace/preview', ['request' => $params]);
    }
}
