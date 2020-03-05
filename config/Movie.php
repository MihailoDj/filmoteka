<?php
    class Movie implements JsonSerializable {
        private $movieID;
        private $name;
        private $director;
        private $releaseDate;

        public function __construct($movieID, $name, $director, $releaseDate) {
            $this->movieID = $movieID;
            $this->name = $name;
            $this->director = $director;
            $this->releaseDate = $releaseDate;
        }

        public function jsonSerialize() {
            $vars = get_object_vars($this);

            return $vars;
        }
    }
?>