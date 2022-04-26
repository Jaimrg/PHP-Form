<?php

namespace App\Entidade;

use App\Db\Database;
use \PDO;

class Provincia{
    

  /**
   * Método responsável por obter as Provinvia do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getAlunos($where = null, $order = null, $limit = null){
    return (new Database('provincia'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma Provinvia com base em seu ID
   * @param  integer $id
   * @return Provincia
   */
  public static function getAluno($id){
    return (new Database('provincia'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }
}