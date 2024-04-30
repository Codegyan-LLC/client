<?php

namespace Codegyan;

use Codegyan\Contracts\ClientContracts; // Ensure correct namespace

// Include the ClientContracts.php file
// require_once 'src/Contracts/ClientContracts.php';


/**
 * Class Client
 * Represents the client for Codegyan API.
 */
final class Client implements ClientContracts {
    private $apiKey; // The API key for authentication
    private $clientId; // The client ID for identification

    /**
     * Constructor.
     *
     * @param string $apiKey The API key.
     * @param string $clientId The client ID.
     */
    public function __construct(string $apiKey, string $clientId) {
        $this->apiKey = $apiKey;
        $this->clientId = $clientId;
    }

    /**
     * Get the API key.
     *
     * @return string The API key.
     */
    public function getApiKey(): string {
        return $this->apiKey;
    }

    /**
     * Get the Client ID.
     *
     * @return string The Client ID.
     */
    public function getClientId(): string {
        return $this->clientId;
    }
}
