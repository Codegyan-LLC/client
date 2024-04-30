<?php

namespace Codegyan\Responses;

use Codegyan\Contracts\ClientContracts; 
use Codegyan\Contracts\Resources\CompilerContracts;

/**
 * Class CompilerApiClient
 * Represents the client for interacting with the compiler API.
 */
final class CompilerApiClient implements CompilerContracts {
    private $client;

    /**
     * Constructor.
     *
     * @param ClientContracts $client The client instance.
     */
    public function __construct(ClientContracts $client) {
        $this->client = $client;
    }

    /**
     * Compiles code using the Codegyan compiler API.
     *
     * @param string $lang The programming language of the code.
     * @param string $code The code to compile.
     * @return mixed The compiled result.
     */
    public function compile(string $lang, string $code) {
        $url = 'https://api.codegyan.in/v1/compiler/compile';
        $headers = [
            'APIKey: ' . $this->client->getApiKey(),
            'ClientID: ' . $this->client->getClientId(),
            'Content-Type: application/json'
        ];
        $data = [
            'lang' => $lang,
            'code' => $code
        ];

        $response = $this->sendRequest($url, 'POST', $headers, json_encode($data));
        return $response;
    }

    /**
     * Sends an HTTP request.
     *
     * @param string $url The URL to send the request to.
     * @param string $method The HTTP method (GET, POST, etc.).
     * @param array $headers The HTTP headers.
     * @param string|null $data The request data.
     * @return mixed The response.
     */
    private function sendRequest(string $url, string $method, array $headers, ?string $data = null) {
        // Implement sendRequest method
        // Example implementation using cURL:
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception("Error sending request: $error");
        }

        curl_close($ch);
        return $response;
    }
}
