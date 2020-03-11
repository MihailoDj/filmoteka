<?php
    class Movie implements JsonSerializable {
        private $movieID;
        private $name;
        private $director;
        private $releaseDate;
        private $leadActors;
        private $supportingActors;

        public function __construct($movieID, $name, $director, $releaseDate, $leadActors, $supportingActors) {
            $this->movieID = $movieID;
            $this->name = $name;
            $this->director = $director;
            $this->releaseDate = $releaseDate;
            $this->leadActors = $leadActors;
            $this->supportingActors = $supportingActors;
        }

        public function jsonSerialize() {
            $vars = get_object_vars($this);

            return $vars;
        }
    }
?>