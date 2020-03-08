<?php
    class User implements JsonSerializable {
        private $id;
        private $username;
        private $roleName;

        public function __construct($id, $username, $roleName) {
            $this->id = $id;
            $this->username = $username;
            $this->roleName = $roleName;
        }

        public function jsonSerialize() {
            $vars = get_object_vars($this);

            return $vars;
        }
    }
?>