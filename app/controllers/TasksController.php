<?php

namespace App\Controllers;

use App\Core\App;

 class TasksController
 {
     public function store()
     {
         App::get('database')->insert('tasks', [
             'description' => $_POST['description'],

             'completed' => false
         ]);

         return redirect('/');
     }

     public function complete()
     {
         App::get('database')->update('tasks', [
             'id' => $_POST['id'],
         ]);

         return redirect('/');
     }

     public function deleteAll()
     {
         App::get('database')->delete('tasks');

         return redirect('/');
     }
 }
