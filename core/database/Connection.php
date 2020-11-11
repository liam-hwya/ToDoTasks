<?php

namespace App\Core\Database;

use PDO;

class Connection{

        public static function make($config){

            try{

                //new PDO('mysql:host=127.0.0.1;dbanem=name',)
            
              return new PDO(

                $config['connection'].';dbname='.$config['name'],

                $config['username'],

                $config['password'],

                $config['options']

              );
            
            }catch(Exception $e){

                die($e->getMessage());
            
              
            
            }
          
        }
        

    }


?>