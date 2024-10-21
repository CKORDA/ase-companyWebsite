<?php

if (!function_exists('loadJSON')) {
    function loadJSON() {
        $jsonData = file_get_contents(__DIR__ . '/../../data/data.json');
        return json_decode($jsonData, true);
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
    function createPage($pageData) {
        $data = loadJSON();
        $data['productsAndServices'][] = $pageData;
        saveJSON($data);
    }
}

if (!function_exists('updatePage')) {
    function updatePage($index, $pageData) {
        $data = loadJSON();
        if (isset($data['productsAndServices'][$index])) {
            $data['productsAndServices'][$index] = $pageData;
            saveJSON($data);
        }
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
