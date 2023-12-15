<?php

//Asumamos que simpsonsData es un array muy grande que lo extrae de la base de datos
$simpsonsData = array(
    "characters" => array(
        array(
            "name" => "Homer",
            "age" => 39,
            "links" => array(
                "self" => array("href" => "/simpsons/character/1", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/1/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Marge",
            "age" => 36,
            "links" => array(
                "self" => array("href" => "/simpsons/character/2", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/2/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Bartolomew",
            "age" => 10,
            "links" => array(
                "self" => array("href" => "/simpsons/character/3", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/3/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Lisa",
            "age" => 8,
            "links" => array(
                "self" => array("href" => "/simpsons/character/4", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/4/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Maggie",
            "age" => 1,
            "links" => array(
                "self" => array("href" => "/simpsons/character/5", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/5/episodes", "method" => "GET")
            )
        )
    )
);