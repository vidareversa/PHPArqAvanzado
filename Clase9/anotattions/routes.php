<?php

class UserController {

    /**
     * (Symfony utiliza este anotation @Route para gestionar las rutas) 
     * 
     * @Route("/users/{id}", name="user_show")
     */
    private function show($id) {
        //....
        echo "saraza";
    }

}