<?php

/**
 * @Entity
 * @Table(name="user")
 */
class User {
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    private $id;

    // ...
}
