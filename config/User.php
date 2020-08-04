<?php
    class User implements JsonSerializable {
        private $id;
        private $username;
        private $roleID;
        private $password;

        public function __construct($id, $username, $password, $roleID) {
            $this->id = $id;
            $this->username = $username;
            $this->roleID = $roleID;
            $this->password = $password;
        }

        public function jsonSerialize() {
            $vars = get_object_vars($this);

            return $vars;
        }
    }
?>