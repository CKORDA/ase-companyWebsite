<?php

if (!function_exists('loadJSON')) {
    function loadJSON() {
        $filePath = __DIR__ . '/../../data/data.json';
        if (file_exists($filePath)) {
            return json_decode(file_get_contents($filePath), true);
        } else {
            error_log("File not found: " . $filePath);
            return null; // Handle file not found
        }
    }
}

if (!function_exists('saveJSON')) {
    function saveJSON($data) {
        file_put_contents(__DIR__ . '/../../data/data.json', json_encode($data, JSON_PRETTY_PRINT));
    }
}

if (!function_exists('retrieveAllPages')) {
    function retrieveAllPages() {
        $data = loadJSON();
        return $data['productsAndServices'];
    }
}

if (!function_exists('retrievePage')) {
    function retrievePage($index) {
        $data = loadJSON();
        return isset($data['productsAndServices'][$index]) ? $data['productsAndServices'][$index] : null;
    }
}

if (!function_exists('createPage')) {
    function createPage($name, $description, $applications) {
        // Load the existing data
        $data = json_decode(file_get_contents(__DIR__ . '/../../data/data.json'), true);
        
        // Create the new page entry
        $newPage = [
            'name' => $name,
            'description' => $description,
            'applications' => $applications
        ];
        
        // Add to the productsAndServices array
        $data['productsAndServices'][] = $newPage;
        
        // Save the updated data back to JSON file
        if (file_put_contents(__DIR__ . '/../../data/data.json', json_encode($data, JSON_PRETTY_PRINT))) {
            return true;
        } else {
            return false;
        }
    }
    
}

function updatePage($index, $name, $description, $applications) {
    $filePath = __DIR__ . '/../../data/data.json';
    $data = json_decode(file_get_contents($filePath), true);

    if (isset($data['productsAndServices'][$index])) {
        $data['productsAndServices'][$index]['name'] = $name;
        $data['productsAndServices'][$index]['description'] = $description;
        $data['productsAndServices'][$index]['applications'] = $applications;

        if (file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT))) {
            return true; 
        } else {
            error_log("Failed to write to JSON file: " . $filePath);
            return false; 
        }
    } else {
        error_log("Invalid index or data structure.");
        return false; 
    }
}



if (!function_exists('deletePage')) {
    function deletePage($index) {
        $data = loadJSON();
        if (isset($data['productsAndServices'][$index])) {
            array_splice($data['productsAndServices'], $index, 1);
            saveJSON($data);
        }
    }
}

?>
