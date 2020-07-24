<?php


namespace App;

class DB
{
    // data base handler
    protected $dbh;

    // В конструкторе устанавливается и сохраняется соединение с базой данных.
    // Параметры соединения берем из файла конфига
    public function __construct()
    {
        $db = require __DIR__ . '/../config.php';
        //dsn - строка описывающая подключение к серверу типбд:параметры
        $dsn = $db['dbType'].':host='.$db['host'].';dbname='.$db['dbname'];
        //dbh - handler соединения с базой данных
        $this->dbh = new \PDO($dsn, $db['user'], $db['pass']);
    }

    // Метод execute(string $sql) выполняет запрос и возвращает true либо false
    // в зависимости от того, удалось ли выполнение
    public function execute(string $sql)
    {
        // statement handler подготавливаем запрос к исполнению
        $sth = $this->dbh->prepare($sql);
        // исполняем подготовленый запрос
        return $sth->execute();
    }

    // Метод query(string $sql, array $data) выполняет запрос, подставляет в него данные $data,
    // возвращает данные результата запроса либо false, если выполнение не удалось
    public function query(string $sql, array $data = [])
    {
        // statement handler подготавливаем запрос к исполнению
        $sth = $this->dbh->prepare($sql);
        // исполняем подготовленый запрос
        $sth->execute($data);
        // получаем данные из db
        return $sth->fetchAll();
    }

}