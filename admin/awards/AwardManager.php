<?php

class Award {
    public $id;
    public $year;
    public $title;
    public $description;

    public function __construct($id, $year, $title, $description) {
        $this->id = $id;
        $this->year = $year;
        $this->title = $title;
        $this->description = $description;
    }

    public function toCSVArray() {
        return [$this->id, $this->year, $this->title, $this->description];
    }
}

class AwardManager {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function getMaxId() {
        $maxId = 0;
        if (($handle = fopen($this->filename, 'r')) !== false) {
            fgetcsv($handle); // Skip the header row
            while (($data = fgetcsv($handle)) !== false) {
                $currentId = intval($data[0]); 
                if ($currentId > $maxId) {
                    $maxId = $currentId; 
                }
            }
            fclose($handle);
        }
        return $maxId;
    }

    public function addAward(Award $award) {
        if (($handle = fopen($this->filename, 'a')) !== false) {
            fputcsv($handle, $award->toCSVArray());
            fclose($handle);
        }
    }

    public function deleteAward($idToDelete) {
        $awards = [];
        if (($handle = fopen($this->filename, 'r')) !== false) {
            $header = fgetcsv($handle); 
            $awards[] = $header; 
            while (($data = fgetcsv($handle)) !== false) {
                if ($data[0] != $idToDelete) { 
                    $awards[] = $data; 
                }
            }
            fclose($handle);
        }

        if (($handle = fopen($this->filename, 'w')) !== false) {
            foreach ($awards as $award) {
                fputcsv($handle, $award); 
            }
            fclose($handle);
        }
    }
}
?>
