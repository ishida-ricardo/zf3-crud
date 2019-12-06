<?php

use Doctrine\ORM\EntityManager;
use User\Entity\User;

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'user'     => 'root',
                    'password' => '123',
                    'dbname'   => 'zf3',
                    'driverOptions' => [
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    ]
                )
            )
        ),
    ),
);