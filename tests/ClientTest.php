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

    public function testCompilePHPCode()
    {
        // PHP code to be compiled
        $lang = 'php';
        $code = '<?php echo "Hello, world!"; ?>';

        // Compile the PHP code
        $result = $this->client->compilerApiClient->compile($lang,$code);

        // Decode the JSON string into an associative array
        $resultArray = json_decode($result, true);

        // Perform assertions on the compiled code
        $this->assertNotEmpty($result);
        $this->assertIsString($result);
        $this->assertStringNotContainsString('<?php', $result); // Compiled code should contain PHP opening tag
        // $this->assertStringContainsString('Hello, world!', $result); // Compiled code should contain the original code, Worked when Provide Api key and Client Id
        // $this->assertEquals('Hello, world!', $resultArray['output']); // Worked when Provide Api key and Client Id
    }

    public function testDomainAvailability()
    {
        // PHP code to be compiled
        $domain = 'codegyan.in';

        // Compile the PHP code
        $result = $this->client->toolsApiClient->domainAvailability($domain);

        // Decode the JSON string into an associative array
        $resultArray = json_decode($result, true);

        // Perform assertions on the response
        $this->assertNotEmpty($resultArray);
        $this->assertArrayHasKey('status', $resultArray);
        // $this->assertArrayHasKey('domain', $resultArray);  //Worked when Provide Api key and Client Id
        // $this->assertArrayHasKey('tld', $resultArray);
        // $this->assertArrayHasKey('available', $resultArray);

        // Check if the domain is available
        // $this->assertEquals('0', $resultArray['status']);
        // $this->assertEquals($domain, $resultArray['domain']); 
        // $this->assertEquals('in', $resultArray['tld']);
        // $this->assertEquals('0', $resultArray['available']);
    }
}
