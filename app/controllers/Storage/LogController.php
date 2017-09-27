<?php

namespace App\Controllers\Storage;

use App\Controllers\Controller;
use App\Controllers\Storage\Validation\LogSaveValidator;
use App\Jobs\Storage\LogSaveJob;
use App\Utils\Queue;

class LogController extends Controller
{

    public function saveAction()
    {
        $validator = new LogSaveValidator();
        $res = $validator->validate($this->request->get());
        if ($res->valid()) {
            // 数据不合法
            return static::error($validator->getErrorMessage());
        }

        $module = $this->request->get('module');
        $prefix = $this->request->get('prefix');
        $data = $this->request->get('data');
        $time = $this->request->get('time');
        $file = $this->request->get('file');

        Queue::push(new LogSaveJob($module, $prefix, $file, $data, $time));

        return static::success();
    }

}

