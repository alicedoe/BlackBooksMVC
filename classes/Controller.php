<?php

class Controller
{

    public function accueil()
    {
        include 'view/headerView.php';
        include(dirname(__FILE__) . '/../view/accueil.php');
        include 'view/footerView.php';
    }


    public function delete($truc, $id)
    {

        $delete = new Model();
        $result = $delete->delete($truc, $id);
        $this->response($result['data'], $result['status']);

    }

    public function get($truc, $id = NULL)
    {

        $gettable = new Model();
        $result = $gettable->get($truc, $id);
        $this->response($result['data'], $result['status'], $result[1]);

    }

    public function post($truc, $param1, $param2 = NULL, $param3 = NULL, $param4 = NULL)
    {

        $posttable = new Model();
        $result = $posttable->post($truc, $param1, $param2, $param3, $param4);
        $this->response($result[0]['data'], $result[0]['status'], $result[1]);

    }

    public function response($data, $status = 200, $results) {
        header("HTTP/1.1 " . $status . " " . $data);
        header("Status: ". $status);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($results);
    }

    public function index() {

        $url=$_SERVER['REQUEST_URI'];

        $url = explode('/', rtrim($url, '/'));

        if ($url[1] != "api") { $this->accueil(); } else {
            $method = $_SERVER['REQUEST_METHOD'];


            switch ($method) {
                case 'DELETE':
                    $this->delete($url[2], $url[3]);
                    break;
                case 'POST':
                    $this->post($url[2], $url[3], $url[4], $url[5], $url[6]);
                    break;
                case 'GET':
                    $this->get($url[2], $url[3]);
                    break;
                default:
                    $this->response('Method Not Allowed', 405);
                    break;
            }

        }
    }

}