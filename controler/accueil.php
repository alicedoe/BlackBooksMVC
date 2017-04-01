<?php

include(dirname(__FILE__) . '/../model/livresModel.php');

$livres = get_livres();

//On inclut la vue
include(dirname(__FILE__) . '/../view/listelivresView.php');


echo "toto";