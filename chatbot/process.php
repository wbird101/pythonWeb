<?php

namespace Google\Cloud\Samples\Dialogflow;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

require __DIR__.'/vendor/autoload.php';

header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set("display_errors", 1);

$msg = $_POST['message'];
$sessionId = $_POST['sessionID'];

$res = detect_intent_texts("courseagent-qpoinr", $msg, $sessionId, "ko");

echo(json_encode(array("result"=>$res)));
function detect_intent_texts($projectId, $text, $sessionId, $languageCode)
{
    // new session
    $test = array('credentials' => 'client-secret.json');
    $sessionsClient = new SessionsClient($test);
    $session = $sessionsClient->sessionName($projectId, $sessionId ?: uniqid());

    // create text input
    $textInput = new TextInput();
    $textInput->setText($text);
    $textInput->setLanguageCode($languageCode);

    // create query input
    $queryInput = new QueryInput();
    $queryInput->setText($textInput);
    // get response and relevant info
    $response = $sessionsClient->detectIntent($session, $queryInput);
    $queryResult = $response->getQueryResult();
    //$queryText = $queryResult->getQueryText();
    //$intent = $queryResult->getIntent();
    //$displayName = $intent->getDisplayName();
    //$confidence = $queryResult->getIntentDetectionConfidence();
    $fulfilmentText = $queryResult->getFulfillmentText();

    $sessionsClient->close();
    return $fulfilmentText;
}

?>
