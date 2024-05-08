<?php
namespace Codegyan;

use Codegyan\Contracts\ClientContracts;
use Codegyan\Responses\CompilerApiClient;
use Codegyan\Responses\ToolsApiClient;

final class Client implements ClientContracts {
    private $apiKey; // The API key for authentication
    private $clientId; // The client ID for identification
    private $compilerApiClient; // The CompilerApiClient instance
    private $toolsApiClient; // The ToolsApiClient instance

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

    /**
     * Magic method to lazily instantiate the CompilerApiClient.
     *
     * @param string $name The name of the property being accessed.
     * @return mixed The value of the property.
     */
    public function __get($name) {
        if ($name === 'compilerApiClient') {
            if (!$this->compilerApiClient) {
                $this->compilerApiClient = new CompilerApiClient($this);
            }
            return $this->compilerApiClient;
        }else{
            if ($name === 'toolsApiClient') {
                if (!$this->toolsApiClient) {
                    $this->toolsApiClient = new ToolsApiClient($this);
                }
            return $this->toolsApiClient;
            }
        }
    }
}
