<?php

namespace Codegyan\Responses;

use Codegyan\Contracts\ClientContracts; 
use Codegyan\Contracts\Resources\ToolsContracts;

/**
 * Class ToolsApiClient
 * Represents the client for interacting with the Tools API.
 */
final class ToolsApiClient implements ToolsContracts {
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
     * Converts an amount from one currency to another using the specified exchange rates.
     *
     * @param string $from_currency The currency to convert from.
     * @param string $to_currency The currency to convert to.
     * @param string $amount The amount to convert.
     * @return mixed The converted amount.
     */
    public function currencyConvert(string $from_currency, string $to_currency, string $amount) {
        $url = 'https://api.codegyan.in/v1/currency';
        $headers = [
            'APIKey: ' . $this->client->getApiKey(),
            'ClientID: ' . $this->client->getClientId(),
            'Content-Type: application/json'
        ];
        $data = [
            'from_currency' => $from_currency,
            'to_currency' => $to_currency,
            'amount' => $amount
        ];

        $response = $this->sendRequest($url, 'POST', $headers, json_encode($data));
        return $response;
    }

    /**
     * Checks the availability of a domain using the specified domain name.
     *
     * @param string $domain The domain name to check availability for.
     * @return mixed The availability status of the domain.
     */
    public function domainAvailability(string $domain) {
        $url = 'https://api.codegyan.in/v1/domain-check';
        $headers = [
            'APIKey: ' . $this->client->getApiKey(),
            'ClientID: ' . $this->client->getClientId(),
            'Content-Type: application/json'
        ];
        $data = [
            'domain' => $domain
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
