<?php
class PageManager {
    private $filePath;

    public function __construct() {
        $this->filePath = __DIR__ . '/../../data/data.json'; 

    }

    private function loadJSON() {
        if (file_exists($this->filePath)) {
            return json_decode(file_get_contents($this->filePath), true);
        } else {
            error_log("File not found: " . $this->filePath);
            return null; 
        }
    }

    private function saveJSON($data) {
        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function retrieveAllPages() {
        $data = $this->loadJSON();
        return $data['productsAndServices'] ?? [];
    }

    public function retrievePage($index) {
        $data = $this->loadJSON();
        return $data['productsAndServices'][$index] ?? null; 
    }

    public function createPage($name, $description, $applications) {
        
        $data = $this->loadJSON();

      
        $newPage = [
            'name' => $name,
            'description' => $description,
            'applications' => $applications
        ];
        
        $data['productsAndServices'][] = $newPage;

        
        return $this->saveJSON($data);
    }

    public function updatePage($index, $name, $description, $applications) {
        $data = $this->loadJSON();

        if (isset($data['productsAndServices'][$index])) {
            $data['productsAndServices'][$index]['name'] = $name;
            $data['productsAndServices'][$index]['description'] = $description;
            $data['productsAndServices'][$index]['applications'] = $applications;

            return $this->saveJSON($data);
        } else {
            error_log("Invalid index or data structure.");
            return false;
        }
    }

    public function deletePage($index) {
        $data = $this->loadJSON();
        if (isset($data['productsAndServices'][$index])) {
            array_splice($data['productsAndServices'], $index, 1);
            return $this->saveJSON($data);
        } else {
            error_log("Invalid index or data structure.");
            return false;
        }
    }
}

?>
