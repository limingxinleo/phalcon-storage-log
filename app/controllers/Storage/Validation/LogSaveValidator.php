<?php
// +----------------------------------------------------------------------
// | LogSaveValidator.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Controllers\Storage\Validation;

use App\Core\Validation\Validator;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Date;

class LogSaveValidator extends Validator
{
    public function initialize()
    {
        $this->add(
            [
                'module',
                'data',
                'time',
            ],
            new PresenceOf([
                'message' => 'The :field is required',
            ])
        );

        $this->add(
            [
                'time',
            ],
            new Date([
                "format" => "Y-m-d H:i:s",
                "message" => "The :field is invalid",
            ])
        );
    }
}