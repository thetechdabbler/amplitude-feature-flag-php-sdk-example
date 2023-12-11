<?php
namespace Root\App;

// Create a singleton instance of the Amplitude client
use AmplitudeExperiment\Experiment;
use AmplitudeExperiment\User;

class AmplitudeService {
    private static $instance = null;
    private $client = null;
    private $experiment = null;

    private function __construct() {
        $this->experiment = new Experiment();
        $this->client = $this->experiment->initializeRemote($_ENV['AMPLITUDE_API_KEY']);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new AmplitudeService();
        }
        return self::$instance;
    }

    public function getClient() {
        return $this->client;
    }

    public function getExperiment() {
        return $this->experiment;
    }

    public function accessFlagVariant( $flag, $userId, $deviceId, $userProperties) {
        $user = User::builder()
            ->userProperties($userProperties) 
            ->build();
        $variants = $this->client->fetch($user)->wait();

        // (3) Access a flag's variant
        $variant = $variants[$flag] ?? null;
        if ($variant) {
            if ($variant->value == 'on') {
                return true;
            } else {
               return false;
            }
        } else {
            return false;
        }
    }
}