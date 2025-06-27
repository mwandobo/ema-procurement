<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Truck\Device;
use App\Models\Truck\DeviceHistory;
use Carbon\Carbon;

class DeviceHistoryUpdate extends Command
{
    protected $signature = 'device_history:update';
    protected $description = 'Fetch all device data from IoT API and store device history';

    public function handle()
    {
        $url = "http://192.46.236.241/location.php";
        $token = "QW12AS34TR54";

        $this->info("Fetching device data...");

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ])->get($url);

            if (!$response->successful()) {
                Log::error('Device API call failed with status: ' . $response->status());
                $this->error('Failed to fetch device data');
                return 1;
            }

            $result = $response->json();

            if (empty($result['data']) || !is_array($result['data'])) {
                $this->warn('No device data found in response.');
                return 0;
            }

            foreach ($result['data'] as $index => $deviceData) {
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
                    $this->warn("Skipping record {$index} due to missing IMEI or sent timestamp.");
                    continue;
                }

                try {
                    $fetched_data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d');

                    $fetched_data['time_sent'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d H:i:s');


                } catch (\Exception $e) {
                    Log::warning("Invalid date format for IMEI {$fetched_data['imei']}: {$fetched_data['sent']}");
                    $this->warn("Skipping record {$index} due to invalid date format.");
                    continue;
                }

                // Reverse geocoding with Google Maps API
                // $googleApiKey = env('GOOGLE_MAPS_API_KEY'); // or put your key directly
                $googleApiKey = "AIzaSyDv8vz14oxg6iZbw_qJFtKU8gomGJcQCPk";
                $lat = $fetched_data['latitude'];
                $lng = $fetched_data['longitude'];
                $location_name = null;

                if ($lat && $lng) {
                    $geoResponse = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
                        'latlng' => "$lat,$lng",
                        'key' => $googleApiKey,
                    ]);

                    if ($geoResponse->successful()) {
                        $geoJson = $geoResponse->json();
                        $location_name = $geoJson['results'][0]['formatted_address'] ?? null;
                    }
                }

                $fetched_data['location_name'] = $location_name;



                $device = Device::firstOrCreate(
                    ['imei' => $fetched_data['imei']],
                    [
                        'name' => 'DIY_DEV0' . (Device::count() + 1),
                        'location_name' => $fetched_data['location_name'],
                        'longitude' => $fetched_data['longitude'],
                        'latitude' => $fetched_data['latitude'],
                        'altitude' => $fetched_data['altitude'],
                        'angle' => $fetched_data['angle'],
                        'satellites' => $fetched_data['satellites'],
                        'speed' => $fetched_data['speed'],
                        'sent' => $fetched_data['sent'],
                        'time_sent' => $fetched_data['time_sent'],
                        'date' => $fetched_data['date'],
                        'status' => 0,
                    ]
                );

                if (!$device->wasRecentlyCreated && $device->time_sent === $fetched_data['time_sent']) {
                    $this->info("Device {$device->imei}: No new data (timestamp unchanged).");
                    continue;
                }

                if (!$device->wasRecentlyCreated) {
                    $device->update($fetched_data);
                    $this->info("Device {$device->imei}: Updated.");
                } else {
                    $this->info("Device {$device->imei}: Created.");
                }

                DeviceHistory::create([
                    'device_id' => $device->id,
                    'device_name' => $device->name,
                    'imei' => $device->imei,
                    'location_name' => $fetched_data['location_name'],
                    'date' => $fetched_data['date'],
                    'longitude' => $fetched_data['longitude'],
                    'latitude' => $fetched_data['latitude'],
                    'altitude' => $fetched_data['altitude'],
                    'angle' => $fetched_data['angle'],
                    'satellites' => $fetched_data['satellites'],
                    'speed' => $fetched_data['speed'],
                    'sent' => $fetched_data['sent'],
                    'time_sent' => $fetched_data['time_sent'],
                    'status' => 0,
                ]);

                $this->info("Device {$device->imei}: History saved.");
            }

            $this->info("All device entries processed.");
            return 0;

        } catch (\Exception $e) {
            Log::error('Exception during device fetch: ' . $e->getMessage());
            $this->error('Unexpected error: ' . $e->getMessage());
            return 1;
        }
    }
}
