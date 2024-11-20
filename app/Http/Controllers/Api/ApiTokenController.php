<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiToken;

class ApiTokenController extends Controller
{
    public function getApiToken() {
        // Create a new Guzzle client
        $client = new Client();

        try {
            // Make the POST request to `uddesign` with email and password
            $response = $client->request('POST', env('MY_API_URL', '').'/api/login', [
                'form_params' => [
                    'email' => env('MY_API_EMAIL', ''),
                    'password' => env('MY_API_PASSWORD', ''),
                ],
            ]);

            // Decode the response body
            $body_contents = json_decode($response->getBody()->getContents(), true);
            
            // Debug the response to ensure token is coming from `uddesign`
            // dd($body_contents);

            if ($response->getStatusCode() == 200 && isset($body_contents['token'])) {
                // Store the token fetched from `uddesign` without creating a new one
                ApiToken::create([
                    'token' => $body_contents['token'],
                ]);

                return response()->json([
                    'successful' => true,
                    'message' => 'Token fetched successfully!',
                    'token' => $body_contents['token'],
                ]);
            } else {
                return response()->json([
                    'successful' => false,
                    'message' => 'Failed to retrieve token.',
                    'error' => $body_contents,
                ], $response->getStatusCode());
            }

        } catch (\Exception $e) {
            return response()->json([
                'successful' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function registerUser()
    {
        $client = new Client();
        $response = $client->request('POST', 'http://uddesign-main.test/api/register', [
            'form_params' => [
                'name' => 'John Doe',
                'email' => 'johndoe2@example.com',
                'password' => 'secret123',
            ],
        ]);

        $body_contents = json_decode($response->getBody()->getContents(), true);

        dd($body_contents); // Debugging to check the response
    }


    

}
