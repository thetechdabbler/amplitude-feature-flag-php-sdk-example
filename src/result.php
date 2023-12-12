<?php
require_once __DIR__ . '/bootstrap.php';

function areYouReady($cid, $property_id, $device) {
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

$cid = $_GET['cid'] ?? null;
$property_id = $_GET['property_id'] ?? null;
$device = $_GET['device'] ?? 'Desktop';

$ready = areYouReady($cid, $property_id, $device);
if ($ready) {
    echo "🥳 Access Granted ✅";
} else {
    echo "😞 Access Denied 🚫";
}
?>