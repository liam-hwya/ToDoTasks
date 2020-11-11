<?php

namespace App\Controllers;

use App\Core\App;

 class PagesController
 {
     public function home()
     {
         $tasks = App::get('database')->selectAll('tasks');

         // die(var_dump($tasks));

         return view('index', [
             'tasks' => $tasks
         ]);
     }

     public function about()
     {
         return view('about');
     }
 }
