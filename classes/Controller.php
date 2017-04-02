<?php

class Controller
{

    public function accueil()
    {
        include 'view/headerView.php';
        include(dirname(__FILE__) . '/../view/accueil.php');
        include 'view/footerView.php';
    }

    public function get_books($id = NULL)
    {

        $livres = new Model();
        echo $livres->get_livres($id);

    }

    public function get_cat($id = NULL)
    {

        $cat = new Model();
        echo $cat->get_cat($id);

    }

    public function post_book($titre = NULL,$auteur = NULL)
    {

        echo "post book";

    }

    public function post_cat($nomcat = NULL)
    {
        $new_cat = new Model();
        echo $new_cat->post_cat($nomcat);
    }

    public function patch_books($id = NULL)
    {

        echo "patch books";

    }

    public function put_books($id = NULL)
    {

        echo "put books";

    }

    public function delete_books($id = NULL)
    {

        echo "delete books";

    }

    public function testurl () {

        $url=$_SERVER['REQUEST_URI'];
        $url = explode("/",$url);
        $tabaction = [ "get","post","patch","put","delete"];

        $verbs = array_map('strtolower', $url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

//        var_dump($verbs);

        if ( $verbs[1] == "api" and in_array($verbs[2], $tabaction)) {
            switch ($verbs[2]) {

                case "get": if ($method == "get")
                                {
                                    if ($verbs[3] == "cat")
                                    { $this->get_cat($verbs[4]); }
                                    elseif ($verbs[3] == "books")
                                    { $this->get_books($verbs[4]); }

                                }
                                    else { $this->accueil(); } break;

                case "post": if ("post" == "post")
                                {
                                    if ($verbs[3] == "cat")
                                        { $this->post_cat($verbs[4]); }
                                    elseif ($verbs[3] == "book")
                                        { $this->post_book($verbs[4],$verbs[5]); }
                                }
                                    else { $this->accueil(); } break;

                case "patch": if ($method == "patch") {$this->patch_books($url[2]);} break;

                case "put": if ($method == "put") {$this->put_books($url[2]);} break;

                case "delete": if ($method == "delete") {$this->delete_books($url[2]);} break;

                default: $this->accueil();

            }



        }

        else { $this->accueil(); }
    }

}