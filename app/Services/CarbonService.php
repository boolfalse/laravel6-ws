<?php

namespace App\Services;

use Carbon\Carbon;

class CarbonService
{
    public function getNow()
    {
        $now = Carbon::now();

        return $now;
    }
}
