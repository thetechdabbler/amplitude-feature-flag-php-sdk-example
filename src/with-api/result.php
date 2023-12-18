
<?php
require_once __DIR__ . '/../bootstrap.php';

function evaluateRemotely($cid, $property_id, $device) {
    $FLAG_KEY = 'awesome-feature';
    $client = new GuzzleHttp\Client([
        'base_uri' => 'https://api.lab.amplitude.com/v1/',
        'headers' => [
            'Authorization' => sprintf('Api-Key %s', $_ENV['AMPLITUDE_API_KEY'])
        ]
    ]);
    
    try {
        $response = $client->get('vardata', [
            'query' => [
                'user_id' => 1,
                'device_id' => 1,
                'flag_key' => $FLAG_KEY,
                'context' => json_encode([
                    'user_properties' => ['cid' => $cid, 'property_id' => $property_id, 'device' => $device]
                ])
            ]
        ]);
    
        $body = $response->getBody();
        $data = json_decode($body, true);

        if( isset($data[$FLAG_KEY]['key']) 
            && $data[$FLAG_KEY]['key'] == 'on') {
            return true;
        }
    } catch (\Exception $e) {
        echo "HTTP Request failed\n";
        echo $e->getMessage();
    }
   
        // (1) Initialize the experiment client
    return false;
}

$cid = $_GET['cid'] ?? null;
$property_id = $_GET['property_id'] ?? null;
$device = $_GET['device'] ?? 'Desktop';
$evaluateLocally = $_GET['local'] ?? false;

// Measure the performance of the experiment
$start = microtime(true);
$ready = evaluateRemotely($cid, $property_id, $device);
$end = microtime(true);

// Log the experiment performance
$duration = $end - $start;
// Show evaluation type on hover
echo "<div title='Test - $duration Sec'>";
if ($ready) {
    echo "🥳 Access Granted ✅ ";
} else {
    echo "😞 Access Denied 🚫";
}
echo "</div>"
?>