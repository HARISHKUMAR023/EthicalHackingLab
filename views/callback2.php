<?php

require '../vendor/autoload.php'; // Include Composer's autoloader
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);


$dotenv->load();

$GITLAB_CLIENT_ID = $_ENV['GITLAB_CLIENT_ID'];
$GITLAB_CLIENT_SECRET = $_ENV['GITLAB_CLIENT_SECRET'];
// Initialize GitLab OAuth2 provider
$provider = new \Omines\OAuth2\Client\Provider\Gitlab([
    'clientId'          => $GITLAB_CLIENT_ID,
    'clientSecret'      => $GITLAB_CLIENT_SECRET,
    'redirectUri'       => 'http://localhost/EthicalHackingLab/views/callback2.php',
    'domain'            => 'https://gitlab.com', // Use GitLab's domain if not self-hosted
]);

// Start the session
session_start();

// Exchange authorization code for access token

// Exchange authorization code for access token
try {
    $accessToken = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
    $_SESSION['access_token'] = $accessToken;
  // We got an access token, let's now get the user's details
$user = $provider->getResourceOwner($accessToken);

// Store the user's details in the session
$_SESSION['user'] = $user->toArray();
    // Redirect to the dashboard
    header('Location: http://localhost/EthicalHackingLab/views/index.php');
    exit();
} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
    // Failed to get access token
    exit('Error: ' . $e->getMessage());
}
?>