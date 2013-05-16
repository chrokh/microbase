<?php
Routes::Add('/'             , 'views/crypto.php'         , 'GET');
Routes::Add('/login'        , 'views/get_login.php'      , 'GET');
Routes::Add('/login'        , 'views/post_login.php'     , 'POST');
Routes::Add('/logout'       , 'views/post_logout.php'    , 'POST');
Routes::Add('/register'     , 'views/get_register.php');
Routes::Add('/register'     , 'views/post_register.php'  , 'POST');

Routes::AddBeforeFilter('/' , array('Authenticator'      , 'Authenticate'));
?>
