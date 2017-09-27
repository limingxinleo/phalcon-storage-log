<?php

namespace App\Controllers\Storage;

use App\Controllers\Controller;
use App\Controllers\Storage\Validation\LogSaveValidator;

class LogController extends Controller
{

    public function saveAction()
    {
        $validator = new LogSaveValidator();
        $res = $validator->validate($this->request->get());
        if ($res->valid()) {
            // 数据不合法
            dd($validator->getErrorMessage());
            return static::error('数据不合法！！');
        }


        $module = $this->request->get();
    }

}

