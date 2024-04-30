<?php

require '../vendor/autoload.php'; // Include Composer's autoloader

// Initialize GitLab OAuth2 provider
$provider = new \Omines\OAuth2\Client\Provider\Gitlab([
    'clientId'          => '694ac74a94d64c0d335404627da960b67c4c20cdd678c02762763028fcb925fe',
    'clientSecret'      => 'gloas-fee4c3f83643f2d0cab7a6257d54e445a32594f6600b259d1f33331b02188690',
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