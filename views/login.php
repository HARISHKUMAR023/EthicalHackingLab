<?php

require '../vendor/autoload.php';

use Omines\OAuth2\Client\Provider\Gitlab;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);


$dotenv->load();

$GITLAB_CLIENT_ID = $_ENV['GITLAB_CLIENT_ID'];
$GITLAB_CLIENT_SECRET = $_ENV['GITLAB_CLIENT_SECRET'];
$provider = new Gitlab([
    'clientId'          => $GITLAB_CLIENT_ID,
    'clientSecret'      => $GITLAB_CLIENT_SECRET,
    'redirectUri'       => 'http://localhost/EthicalHackingLab/views/callback2.php',
    'domain'            => 'https://gitlab.com',
    'scopes'            => ['read_user', 'openid', 'profile', 'email'],
]);

session_start();

if (!isset($_GET['code'])) {
    // If we don't have an authorization code then get one
    $options = [
        'state' => 'OPTIONAL_CUSTOM_CONFIGURED_STATE',
        'scope' => ['read_user', 'openid', 'profile', 'email']
    ];
    $authUrl = $provider->getAuthorizationUrl($options);
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    // Check given state against previously stored one to mitigate CSRF attack
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
} else {
    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {
        // We got an access token, let's now get the user's details
        $user = $provider->getResourceOwner($token);

        // Use these details to create a new profile
        printf('Hello %s!', $user->getName());

    } catch (Exception $e) {
        // Failed to get user details
        exit('Oh dear...');
    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();
}