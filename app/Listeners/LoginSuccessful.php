<?php

namespace App\Listeners;

use GuzzleHttp\Client;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccessful
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Get user details from the event
        $user = $event->user;

        // Create a new Guzzle client
        $client = new Client();

        try {
            // Make the POST request to `uddesign` with email and password
            $response = $client->request('POST', env('UDDESIGN_API_URL', '').'/api/login', [
                'form_params' => [
                    'email' => env('UDDESIGN_API_EMAIL', ''),
                    'password' => env('UDDESIGN_API_PASSWORD', ''),
                ],
            ]);

            // Decode the response body
            $body_contents = json_decode($response->getBody()->getContents(), true);

            if ($response->getStatusCode() == 200 && isset($body_contents['token'])) {
                // Store the token in the session
                session(['uddesign_api_token' => $body_contents['token']]);
            } else {
                // Handle failure to retrieve token
                // Log or handle the error as necessary
            }
            // $api_token = session('api_token');
            // dd($api_token);
        } catch (\Exception $e) {
            // Handle exception
            // Log or handle the error as necessary
        }
    }

}
