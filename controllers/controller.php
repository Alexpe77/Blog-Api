<?php

class Controller {
    public function view($view, $data = []) {
        extract($data);
        // require_once(); // TODO : ADD CORRECT PATH
    }

    public function error404() {
        return "Erreur 404";
    }
}