<?php

namespace Codegyan\Contracts;

/**
 * Interface ClientContracts
 * Defines the contract for the client class.
 */
interface ClientContracts {
    
    /**
     * Get the API key.
     * 
     * @return string The API key.
     */
    public function getApiKey(): string;
    
    /**
     * Get the Client ID.
     * 
     * @return string The Client ID.
     */
    public function getClientId(): string;
}
