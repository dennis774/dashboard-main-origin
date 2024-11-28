<?php

namespace App\Listeners;

use GuzzleHttp\Client;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LoginSuccessful
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Initialization if needed
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        $client = new Client();

        $apiConfigs = [
            'uddesign' => [
                'url' => env('UDDESIGN_API_URL', '') . '/api/login',
                'email' => env('UDDESIGN_API_EMAIL', ''),
                'password' => env('UDDESIGN_API_PASSWORD', ''),
                'session_key' => 'uddesign_api_token',
            ],
            'kuwago_one' => [
                'url' => env('KUWAGO_ONE_API_URL', '') . '/api/login',
                'email' => env('KUWAGO_ONE_API_EMAIL', ''),
                'password' => env('KUWAGO_ONE_API_PASSWORD', ''),
                'session_key' => 'kuwago_one_api_token',
            ],
            'kuwago_two' => [
                'url' => env('KUWAGO_TWO_API_URL', '') . '/api/login',
                'email' => env('KUWAGO_TWO_API_EMAIL', ''),
                'password' => env('KUWAGO_TWO_API_PASSWORD', ''),
                'session_key' => 'kuwago_two_api_token',
            ],
        ];

        foreach ($apiConfigs as $config) {
            $this->fetchApiToken($client, $config['url'], $config['email'], $config['password'], $config['session_key']);
        }
    }

    private function fetchApiToken($client, $url, $email, $password, $sessionKey)
    {
        try {
            $response = $client->request('POST', $url, [
                'form_params' => [
                    'email' => $email,
                    'password' => $password,
                ],
            ]);

            $body_contents = json_decode($response->getBody()->getContents(), true);

            if ($response->getStatusCode() == 200 && isset($body_contents['token'])) {
                session([$sessionKey => $body_contents['token']]);
            } else {
                Log::warning("Failed to retrieve token from {$url}");
            }
        } catch (\Exception $e) {
            Log::error("Failed to fetch API token from {$url}: " . $e->getMessage());
        }
    }
}
