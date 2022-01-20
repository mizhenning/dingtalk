<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Messages;

class File extends Message
{
    public function __construct($mediaId)
    {
        $this->message = [
            'msgtype' => 'file',
            'file' => [
                'media_id' => $mediaId
            ]
        ];
    }
}
