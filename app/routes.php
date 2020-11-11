<?php

    $router->get('', 'PagesController@home');

    $router->post('tasks', 'TasksController@store');

    $router->post('tasks/update', 'TasksController@complete');

    $router->post('tasks/delete', 'TasksController@deleteAll');

    $router->get('about','PagesController@about');
