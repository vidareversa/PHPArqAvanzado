<?php

/**
 * @Entity
 * @Table(name="users")
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
