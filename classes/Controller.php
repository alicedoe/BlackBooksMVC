<?php

class Controller
{

    public function accueil()
    {

        include(dirname(__FILE__) . '/../view/accueil.php');

    }

    public function get_books($id = NULL)
    {

        $livres = new Model();
        var_dump($livres->get_livres($id));
        return json_encode($livres->get_livres($id));

    }

    public function post_books($id = NULL)
    {

        echo "post books";

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
        $verb = strtolower($url[1]);
        if (in_array($verb, $tabaction)) {
            switch ($verb) {
                case "get": $this->get_books($url[2]); break;
                case "post": $this->post_books($url[2]); break;
                case "patch": $this->patch_books($url[2]); break;
                case "put": $this->put_books($url[2]); break;
                case "delete": $this->delete_books($url[2]); break;
            }



        }

        else { $this->accueil(); }
    }

}