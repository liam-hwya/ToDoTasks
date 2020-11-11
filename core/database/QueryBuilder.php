<?php

namespace App\Core\Database;

use App\Models\Tasks;
use PDO;

 class QueryBuilder
 {
     protected $pdo ;

     public function __construct(PDO $pdo)
     {
         $this->pdo = $pdo;
     }

     public function selectAll($table)
     {
         try {
             $sql = "select * from ${table}";

             $statement = $this->pdo->prepare($sql);

             $statement->execute();

             return $statement->fetchAll(PDO::FETCH_OBJ);
         } catch (Exception $e) {
             die(var_dump($e->getMessage()));
         }
     }

     public function insert($table, $parameters)
     {
         $sql = sprintf(
             'insert into %s (%s) values (%s)',
             $table,
             implode(',', array_keys($parameters)),
             ':' . implode(',:', array_keys($parameters))
         );

         try {
             $statement = $this->pdo->prepare($sql);

             $statement->execute($parameters);
         } catch (Exception $e) {
             die($e->getMessage());
         }
     }

     public function update($table, $parameters)
     {
         $sql = sprintf(
             'update %s set completed=true where %s=%s',
             $table,
             implode(',', array_keys($parameters)),
             ':' . implode(',:', array_keys($parameters))
         );

         try {
             $statement = $this->pdo->prepare($sql);

             $statement->execute($parameters);
         } catch (Exception $e) {
             die($e->getMessage());
         }
     }

     public function delete($table)
     {
         $sql = sprintf(
             'delete from %s',
             $table
         );

         try {
             $statement = $this->pdo->prepare($sql);

             $statement->execute();
         } catch (Exception $e) {
             die($e->getMessage());
         }
     }
 }
