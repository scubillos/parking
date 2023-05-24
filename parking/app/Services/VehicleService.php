<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VehicleService
{
    /**
     * @throws Exception
     */
    public static function getAll()
    {
        try {
            $host = getenv('API_VEHICLES', 'http://localhost:8001');

            $collection = Cache::get('vehicles');

            if (!$collection) {
                $response = Http::get($host . '/api/vehicle');
                $collection = $response->collect();
                Cache::put('vehicles', $collection, now()->addMinutes(1));
            }

            return $collection;
        } catch (Exception $e) {
            throw new Exception($e->getMessage() . $e->getLine(), $e->getCode());
        }
    }
}
