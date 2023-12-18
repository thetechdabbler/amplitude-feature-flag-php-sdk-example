
<?php
require_once __DIR__ . '/bootstrap.php';

function evaluateRemotely($cid, $property_id, $device) {
    
    // (1) Initialize the experiment client
    $experiment = new \AmplitudeExperiment\Experiment();
    $client = $experiment->initializeRemote($_ENV['AMPLITUDE_API_KEY']);

    // (2) Fetch variants for a user
    $user = \AmplitudeExperiment\User::builder()
        ->userProperties(['cid' => $cid, 'property_id' => $property_id, 'device' => $device]) 
        ->build();
    $variants = $client->fetch($user)->wait();

    // (3) Access a flag's variant
    $variant = $variants['awesome-feature'] ?? null;
    if ($variant && $variant->value == 'on') {
       return true;
    }
    return false;
}

function evaluateLocally($cid, $property_id, $device) {
    
    // (1) Initialize the experiment client
    $experiment = new \AmplitudeExperiment\Experiment();
    $client = $experiment->initializeLocal($_ENV['AMPLITUDE_API_KEY']);
    $client->start()->wait();

    // (2) Fetch variants for a user
    $user = \AmplitudeExperiment\User::builder()
        ->userProperties(['cid' => $cid, 'property_id' => $property_id, 'device' => $device]) 
        ->build();
    $variants = $client->evaluate($user);

    // (3) Access a flag's variant
    $variant = $variants['awesome-feature'] ?? null;
    if ($variant && $variant->value == 'on') {
       return true;
    }
    return false;
}

$cid = $_GET['cid'] ?? null;
$property_id = $_GET['property_id'] ?? null;
$device = $_GET['device'] ?? 'Desktop';
$evaluateLocally = $_GET['local'] ?? false;

// Measure the performance of the experiment
$start = microtime(true);
if($evaluateLocally) {
    $ready = evaluateLocally($cid, $property_id, $device);
} else {
    $ready = evaluateRemotely($cid, $property_id, $device);
}
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