<?php

namespace App\Http\Controllers\Api_controllers\Iot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Truck\Device;
use App\Models\Truck\DeviceHistory;
use Carbon\Carbon;

class DeviceHistoryController extends Controller
{
    public function updateDeviceHistory()
    {
        $url = "http://192.46.236.241/location.php";
        $token = "QW12AS34TR54";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ])->get($url);

            if (!$response->successful()) {
                Log::error('Device API call failed with status: ' . $response->status());
                return response()->json(['error' => 'Failed to fetch device data'], 500);
            }

            $result = $response->json();

            // Ensure response contains data
            if (!isset($result['data'][0])) {
                return response()->json(['error' => 'Invalid response format'], 422);
            }

            $deviceData = $result['data'][0];

            // Extract required fields
            $fetched_data = [
                'imei' => $deviceData['imei'] ?? null,
                'longitude' => $deviceData['longitude'] ?? null,
                'latitude' => $deviceData['latitude'] ?? null,
                'altitude' => $deviceData['altitude'] ?? null,
                'angle' => $deviceData['angle'] ?? null,
                'satellites' => $deviceData['satellites'] ?? null,
                'speed' => $deviceData['speed'] ?? null,
                'sent' => $deviceData['sent'] ?? null,
            ];

            if (empty($fetched_data['imei']) || empty($fetched_data['sent'])) {
                return response()->json(['error' => 'Missing required IMEI or timestamp'], 422);
            }

            try {
                $fetched_data['date'] = Carbon::createFromFormat('d/m/Y H:i:s', $fetched_data['sent'])->format('Y-m-d');
            } catch (\Exception $e) {
                Log::warning('Invalid date format in sent field: ' . $fetched_data['sent']);
                return response()->json(['error' => 'Invalid date format in sent field'], 422);
            }

            // Get or create device
            $device = Device::firstOrCreate(
                ['imei' => $fetched_data['imei']],
                [
                    'name' => 'DIY_DEV0' . (Device::count() + 1),
                    'longitude' => $fetched_data['longitude'],
                    'latitude' => $fetched_data['latitude'],
                    'altitude' => $fetched_data['altitude'],
                    'angle' => $fetched_data['angle'],
                    'satellites' => $fetched_data['satellites'],
                    'speed' => $fetched_data['speed'],
                    'sent' => $fetched_data['sent'],
                    'date' => $fetched_data['date'],
                ]
            );

            // If not newly created and sent hasn't changed, skip saving history
            if (!$device->wasRecentlyCreated && $device->sent === $fetched_data['sent']) {
                return response()->json([
                    'success' => false,
                    'message' => 'No new data. The "sent" timestamp has not changed.',
                ]);
            }

            // Update device if it already exists
            if (!$device->wasRecentlyCreated) {
                $device->update($fetched_data);
            }

            // Save device history
            $device_history = DeviceHistory::create([
                'device_id' => $device->id,
                'device_name' => $device->name,
                'imei' => $device->imei,
                'date' => $fetched_data['date'],
                'longitude' => $fetched_data['longitude'],
                'latitude' => $fetched_data['latitude'],
                'altitude' => $fetched_data['altitude'],
                'angle' => $fetched_data['angle'],
                'satellites' => $fetched_data['satellites'],
                'speed' => $fetched_data['speed'],
                'sent' => $fetched_data['sent'],
                'status' => 0,
            ]);

            return response()->json([
                'success' => true,
                'device' => $device,
                'history' => $device_history,
            ]);

        } catch (\Exception $e) {
            Log::error('Exception during device fetch: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}

