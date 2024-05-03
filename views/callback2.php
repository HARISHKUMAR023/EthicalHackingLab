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

// Retrieve the access token from the session
$access_token = $_SESSION['access_token'];
// Exchange authorization code for access token

// Exchange authorization code for access token
try {
    $accessToken = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
   
     $_SESSION['access_token'] = $accessToken->getToken();
  // We got an access token, let's now get the user's details
$user = $provider->getResourceOwner($accessToken);
$db = new mysqli('localhost', 'root', '', 'kavasam');

// Get the user's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];
// Check if the user already exists in the database
$result = $db->query(sprintf(
    "SELECT * FROM users WHERE gitlab_id = '%s'",
    $db->real_escape_string($user->getId())
));

if ($result->num_rows > 0) {
    // The user already exists, so update their data
    $db->query(sprintf(
        "UPDATE users SET name = '%s', email = '%s', avatar_url = '%s' , last_login=Now(), ip_address = '%s' WHERE gitlab_id = '%s'",
        $db->real_escape_string($user->getName()),
        $db->real_escape_string($user->getEmail()),
        $db->real_escape_string($user->getAvatarUrl()),
        $db->real_escape_string($ip_address),
        $db->real_escape_string($user->getId())
    ));
} else {
    // The user doesn't exist, so insert a new record
    $db->query(sprintf(
        "INSERT INTO users (gitlab_id, name, email, avatar_url,last_login,ip_address) VALUES ('%s', '%s', '%s', '%s')",
        $db->real_escape_string($user->getId()),
        $db->real_escape_string($user->getName()),
        $db->real_escape_string($user->getEmail()),
        $db->real_escape_string($user->getAvatarUrl()),
        $db->real_escape_string($ip_address)
    ));
}
// Store the user's details in the session
$_SESSION['user'] = $user->toArray();
    // Redirect to the dashboard
    header('Location: http://localhost/EthicalHackingLab/views/dashbord/index.php');
    exit();
} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
    // Failed to get access token
    exit('Error: ' . $e->getMessage());
}
?>