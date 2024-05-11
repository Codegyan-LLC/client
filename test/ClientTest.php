<?php

use PHPUnit\Framework\TestCase;
use Codegyan\Client;

class ClientTest extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        // Replace 'YOUR_API_KEY' and 'YOUR_CLIENT_ID' with your actual API key and client ID
        $this->client = new Client('YOUR_API_KEY', 'YOUR_CLIENT_ID');
    }

    public function testCompilerCompile()
    {
        $result = $this->client->compilerApiClient->compile([
            'language' => 'php',
            'code' => '<?php echo "Hello, world!";',
        ]);

        $this->assertEquals('Hello, world!', $result['output']);
    }

    public function testToolsApiClientDomainAvailability()
    {
        $result = $this->client->toolsApiClient->domainAvailability([
            'domain' => 'codegyan.in',
        ]);

        $this->assertEquals('1', $result['status']);
        $this->assertEquals('codegyan.in', $result['domain']);
        $this->assertEquals('co.in', $result['tld']);
        $this->assertEquals('1', $result['available']);
    }

}
