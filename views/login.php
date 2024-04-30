<?php

require '../vendor/autoload.php';

use Omines\OAuth2\Client\Provider\Gitlab;

$provider = new Gitlab([
    'clientId'          => '694ac74a94d64c0d335404627da960b67c4c20cdd678c02762763028fcb925fe',
    'clientSecret'      => 'gloas-fee4c3f83643f2d0cab7a6257d54e445a32594f6600b259d1f33331b02188690',
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