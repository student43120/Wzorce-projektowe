

<?php

class routerPool
{
    private static $pool = [];

    public static function __construct()
    {
        for ($i = 0; $i < 100; $i++) {
            $connection = mysqli_connect('localhost', 'root', '', 'table');
            routerPool::$pool[] = $connection;
        }
    }

    public static function getConnection()
    {
        if (empty(routerPool::$pool)) {
            return "Wszystkie połączenia zostały wykorzystane";
        }

        return array_pop(routerPool::$pool);
    }
    public static function close($connection)
    {
        routerPool::$pool[] = $connection;
    }
}


class Orders
{
    public function save()
    {
        $con = routerPool::getConnection();
        mysqli_query($con, 'INSERT INTO zamówienia .....');
        routerPool::close($con);
    }
}

class OrdersDetail
{
    public function save()
    {
        $con = routerPool::getConnection();
        mysqli_query($con, 'INSERT INTO opis zamówień .....');
        routerPool::close($con);
    }
}

class App
{
    public function main()
    {
        $order = new Orders();
        $order->save("data");

        $orderDetail = new OrdersDetail();
        $orderDetail->save("data1");
        $orderDetail->save("data2");
        $orderDetail->save("data3");
    }
}


_____________________________________________________________________________________


Wrong code:

<?php

class Connection
{
    private static $connection;

    public static function openConnection()
    {
        if (empty($connection)) {
            Connection::$connection = mysqli_connect('localhost', 'root', '', 'table');
        }

        return Connection::$connection;
    }
}

class Orders
{
    public function save()
    {
        $con = Connection::openConnection();
        mysqli_query($con, 'INSERT INTO zamówienia .....');
    }
}

class OrdersDetail
{
    public function save()
    {
        $con = Connection::openConnection();
        mysqli_query($con, 'INSERT INTO opis zamówień .....');
    }
}

class routerPool
{
    public function main()
    {
        $order = new Orders();
        $order->save("data");

        $orderDetail = new OrdersDetail();
        $orderDetail->save("data1");
        $orderDetail->save("data2");
        $orderDetail->save("data3");
    }
}


