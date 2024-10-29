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
}

class AwardManager {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function readAwards() {
        $awards = [];
        if (($handle = fopen($this->filename, 'r')) !== false) {
            fgetcsv($handle); // Skip header row
            while (($data = fgetcsv($handle)) !== false) {
                $awards[] = new Award($data[0], $data[1], $data[2], $data[3]);
            }
            fclose($handle);
        }
        return $awards;
    }

    public function addAward($award) {
    $newId = $this->getMaxId() + 1; 
    $newAward = [$newId, $award->year, $award->title, $award->description];

    if (($handle = fopen($this->filename, 'a')) !== false) {
        fputcsv($handle, $newAward);
        fclose($handle);
    }
}


    public function deleteAward($idToDelete) {
        $awards = $this->readAwards();
        $updatedAwards = array_filter($awards, function($award) use ($idToDelete) {
            return $award->id != $idToDelete;
        });

        $this->writeAwards($updatedAwards);
    }

    public function getAwardById($id) {
        $awards = $this->readAwards();
        foreach ($awards as $award) {
            if ($award->id == $id) {
                return $award;
            }
        }
        return null;
    }

    public function updateAward($id, $year, $title, $description) {
        $awards = $this->readAwards();
        foreach ($awards as &$award) {
            if ($award->id == $id) {
                $award->year = $year;
                $award->title = $title;
                $award->description = $description;
            }
        }
        $this->writeAwards($awards);
    }

    public function getMaxId() { 
        $maxId = 0;
        if (($handle = fopen($this->filename, 'r')) !== false) {
            fgetcsv($handle); 
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

    private function writeAwards($awards) {
        if (($handle = fopen($this->filename, 'w')) !== false) {
            // Write header
            fputcsv($handle, ['ID', 'Year', 'Title', 'Description']);
            foreach ($awards as $award) {
                fputcsv($handle, [$award->id, $award->year, $award->title, $award->description]);
            }
            fclose($handle);
        }
    }
}

?>
