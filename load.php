<?php

function getSearchResults($query, $start = 1)
{
    $apiKey = 'xxxx'; // put your api...
    $cx = 'xxxx';   // put your cs id of your programmable search engine..
    $url = "https://www.googleapis.com/customsearch/v1?key=$apiKey&cx=$cx&q=" . urlencode($query) . "&start=" . urlencode($start);

    // Make the request and get the response
    $response = file_get_contents($url);

    // Check if the response is not false
    if ($response === FALSE) {
        echo json_encode(['error' => 'Request failed']);
        exit();
    }

    // Decode the JSON response into an associative array
    $data = json_decode($response, true);

    // Return the decoded data
    return $data;
}

$query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : "";
$start = isset($_GET['start']) ? (int)$_GET['start'] : 1;

if ($query) {
    $searchResults = getSearchResults($query, $start);
    echo json_encode($searchResults);
} else {
    echo json_encode(['error' => 'No query provided']);
}

?>
