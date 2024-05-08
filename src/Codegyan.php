<?php
namespace Codegyan; 

use Codegyan\Client;

final class Codegyan
{
    /**
     * Creates a new Codegyan Client with the given API key and optional client ID.
     *
     * @param string $apiKey The API key for authentication.
     * @param string|null $clientId The client ID (optional).
     * @return Client A new instance of the Client class.
     */
    public static function client(string $apiKey, ?string $clientId = null): Client
    {
        return new Client($apiKey, $clientId);
    }
}
