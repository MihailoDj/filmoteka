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

        public function __get($name) {
            if (property_exists($this, $name)) {
              return $this->$name;
            }
          }
        
          public function __set($name, $value) {
            if (property_exists($this, $name)) {
              $this->$name = $value;
            }
        }
    }
?>