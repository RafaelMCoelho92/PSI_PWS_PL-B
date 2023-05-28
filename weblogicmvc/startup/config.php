<?php
require 'vendor/autoload.php';

define('APP_NAME', 'TeSPZorro PSI'); //nome app
define('INVALID_ACCESS_ROUTE', 'c=auth&a=index');

ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/bdtespzorro',//BD
        )
    );
});
