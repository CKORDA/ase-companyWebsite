<?php

// Function to load the JSON data from the file
function loadData() {
    // Read data from the JSON file
    $json_data = file_get_contents('data.json');
    
    // Decode JSON data into an associative array
    return json_decode($json_data, true);
}

// Check if the request is for a specific section
if (isset($_GET['section'])) {
    $data = loadData(); // Load the data from JSON file

    // Set the header to specify that we're returning JSON content
    header('Content-Type: application/json');

    // Return the specific section of the JSON data
    switch ($_GET['section']) {
        case 'overview':
            echo json_encode(['overview' => $data['overview']]);
            break;
        case 'mission_statement':
            echo json_encode(['mission_statement' => $data['mission_statement']]);
            break;
        case 'productsAndServices':
            echo json_encode(['productsAndServices' => $data['productsAndServices']]);
            break;
        case 'awards':
            echo json_encode(['awards' => $data['awards']]);
            break;
        case 'team':
            echo json_encode($data['team']);
            break;
        default:
            echo json_encode(['error' => 'Invalid section requested']);
    }
    exit(); // Stop script execution after returning the JSON
}

?>
