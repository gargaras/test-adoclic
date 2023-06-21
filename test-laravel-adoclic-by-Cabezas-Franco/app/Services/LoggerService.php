<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class LoggerService
{
    public function log($message, $level = 'info')
    {
        Log::channel('custom_service')->$level($message);
    }
}
