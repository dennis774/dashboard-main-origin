<?php


namespace App\Services;

use Google_Client;
use Google_Service_Sheets;

class GoogleSheetService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        $serviceAccountPath = storage_path('app/google-service-account.json');  

        $this->client = new Google_Client();
        // $this->client->setAuthConfig(config('services.google.service_account_path'));
        $this->client->setAuthConfig($serviceAccountPath);
        $this->client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);

        $this->service = new Google_Service_Sheets($this->client);
        $this->spreadsheetId = config('services.google.sheet_id');
    }

    public function getSheetData($range)
    {
        $response = $this->service->spreadsheets_values->get($this->spreadsheetId, $range);
        return $response->getValues();
    }
}
