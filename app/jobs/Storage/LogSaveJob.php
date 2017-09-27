<?php

namespace App\Jobs\Storage;

use App\Jobs\Contract\JobInterface;
use Xin\Phalcon\Logger\Sys;

class LogSaveJob implements JobInterface
{
    public $module;

    public $prefix;

    public $file;

    public $data;

    public $time;

    public function __construct($module, $prefix, $file, $data, $time)
    {
        $this->module = $module;
        $this->prefix = $prefix;
        $this->file = $file;
        $this->data = $data;
        $this->time = $time;
    }

    public function handle()
    {
        $factory = di('logger');
        $date = date('Y-m-d', strtotime($this->time));

        $dir = $this->module . '/' . $this->prefix . '/' . $date;
        $logger = $factory->getLogger($this->file, Sys::LOG_ADAPTER_FILE, ['dir' => $dir]);
        $logger->info($this->data);
    }
}

