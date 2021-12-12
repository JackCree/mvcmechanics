<?php

namespace MVC\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=sql102.epizy.com;dbname=epiz_30539641_mvc_data;charset=utf8', 'epiz_30539641', 'z24D4A9sQLs');
        return $db;
    }
}