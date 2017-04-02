<?php

class Controller
{

    public function accueil()
    {
        include 'view/headerView.php';
        include(dirname(__FILE__) . '/../view/accueil.php');
        include 'view/footerView.php';
    }

//    public function get_books($id = NULL)
//    {
//
//        $livres = new Model();
//        echo $livres->get_livres($id);
//
//    }
//
//    public function get_cat($id)
//    {
//
//        $cat = new Model();
//        echo $cat->get_cat($id);
//
//    }
//
//    public function post_book($titre,$auteur,$idcat)
//    {
//
//        $new_book = new Model();
//        echo $new_book->post_book($titre,$auteur,$idcat);
//
//    }
//
//    public function post_cat($nomcat = NULL)
//    {
//        $new_cat = new Model();
//        echo $new_cat->post_cat($nomcat);
//    }
//
//    public function patch_book($id = NULL)
//    {
//
//        echo "patch books à faire";
//
//    }
//
//    public function patch_cat($id,$nomcat)
//    {
//
//        $patch_cat = new Model();
//        echo $patch_cat->patch_cat($id,$nomcat);
//
//    }
//
//    public function delete_book($id)
//    {
//
//        $delete_book = new Model();
//        echo $delete_book->delete_book($id);
//
//    }
//
//    public function delete_cat($id)
//    {
//
//        $delete_cat = new Model();
//        echo $delete_cat->delete_cat($id);
//
//    }


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
        $this->response($result[0]['data'], $result[0]['status'], $result[1]);

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

    public function testurl () {

        $url=$_SERVER['REQUEST_URI'];
        $url = explode('/', rtrim($url, '/'));

        $method = $_SERVER['REQUEST_METHOD'];
        $this->post($url[2], $url[3], $url[4], $url[5], $url[6]);


//        switch($method) {
//            case 'DELETE': $this->delete($url[2], $url[3]); break;
//            case 'POST': $this->post($url[2], $url[3], $url[4], $url[5], $url[6]); break;
//            case 'GET': $this->get($url[2], $url[3]); break;
//            case 'PATCH': break;
//            default: $this->response('Method Not Allowed', 405);
//                break;
//        }

//        $tabaction = [ "get","post","patch","put","delete"];
//
//        $verbs = array_map('strtolower', $url);
//        var_dump($verbs);

//        if ( $verbs[1] == "api" and in_array($verbs[2], $tabaction)) {
//            switch ($verbs[2]) {
//
//                case "get": if ($method == "get")
//                                {
//                                    if ($verbs[3] == "cat")
//                                    { $this->get_cat($verbs[4]); }
//                                    elseif ($verbs[3] == "books")
//                                    { $this->get_books($verbs[4]); }
//
//                                }
//                                    else { $this->accueil(); } break;
//
//                case "post": if ($method == "post")
//                                {
//                                    if ($verbs[3] == "cat")
//                                        { $this->post_cat($verbs[4]); }
//                                    elseif ($verbs[3] == "book" and !empty($verbs[4]) and !empty($verbs[5]) and !empty($verbs[6]))
//                                        { $this->post_book($verbs[4],$verbs[5],$verbs[6]); } else { $this->accueil(); }
//                                }
//                                    else { $this->accueil(); } break;
//
//                case "patch": if ($method == "patch") {
//                                    if ($verbs[3] == "cat" and !empty($verbs[4]) and !empty($verbs[5]) )
//                                    { $this->patch_cat($verbs[4],$verbs[5]); }
//                                    else { $this->accueil(); } break;
//
//                                } break;
//
//                case "delete": if ($method == "delete")
//                                {
//                                    if ($verbs[3] == "cat")
//                                        { $this->delete_cat($verbs[4]); }
//                                    elseif ($verbs[3] == "book")
//                                        { $this->delete_book($verbs[4]); }
//
//                                } else {return json_encode("method not allowed", 403);}; break;
//
//                default: $this->accueil();
//
//            }
//
//
//
//        }
//
//        else { $this->accueil(); }
    }

}