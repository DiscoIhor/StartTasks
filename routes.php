<?php

class Routes
{
    public $routs;

    const ROUTES = [
        '/auth' => 'handleAuth',
        '/profile' => 'handleProfile',
        '/main' => 'handleMain',
        '/login' => 'logIn',
        '/task1' => 'task1',
        '/task2' => 'task2',
        '/task3' => 'task3',
        '/task4' => 'task4',
        '/task5' => 'task5',
        '/task6' => 'task6',
        '/task7' => 'task7',
        '/task8' => 'task8'
    ];


    function __construct($routs)
    {
        $this->routs = $routs;
    }

    public function checkUrl()
    {
        if (key_exists($this->routs, self::ROUTES)) {
            switch ($this->routs) {
                case '/auth':
                    $this->makeAuth();
                    break;
                case '/main':
                    $this->goHome();
                    break;
                case '/login':
                    $this->logIn();
                    break;
                case '/task1':
                    $this->doTask1();
                    break;
                case '/task2':
                    $this->doTask2();
                    break;
                case '/task3':
                    $this->doTask3();
                    break;
                case '/task4':
                    $this->doTask4();
                    break;
                case '/task5':
                    $this->doTask5();
                    break;
                case '/task6':
                    $this->doTask6();
                    break;
                case '/task7':
                    $this->doTask7();
                    break;
                case '/task8':
                    $this->doTask8();
                    break;
                default:
                    $this->call404();
                    break;
            }
        } else {
            $this->call404();
        }
    }

    private function makeAuth()
    {
        return;
    }

    private function call404()
    {
        return;
    }

    private function goHome()
    {
        return;
    }
    private function logIn()
    {
        return;
    }
    private function doTask1()
    {
        return;
    }
    private function doTask2()
    {
        return;
    }
    private function doTask3()
    {
        return;
    }
    private function doTask4()
    {
        return;
    }
    private function doTask5()
    {
        return;
    }
    private function doTask6()
    {
        return;
    }
    private function doTask7()
    {
        return;
    }
    private function doTask8()
    {
        return;
    }
}

?>

