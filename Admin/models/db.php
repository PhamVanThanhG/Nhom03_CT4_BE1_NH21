<?php
//tạo class quản lí database
class Db
{
    //khai báo trường dữ liệu
    public static $connection;
    //Constructer
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);
            self::$connection->set_charset(DB_CHARSET);
        }
        return self::$connection;
    }
}
?>