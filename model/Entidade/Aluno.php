<?php

namespace App\Entidade;

use App\Db\Database;
use \PDO;

class Aluno{

  /**
   * Identificador único da Aluno
   * @var integer
   */
  public $id;

  /**
   *
   * @var string
   */
  public $nome;

  /**
   * 
   * @var string
   */
  public $apelido;

  /**
   * 
   * @var string
   */
  public $data_nascimento;

  /**
   * 
   * @var int
   */
  public $distrito_id;

  /**
   * 
   * @var int
   */
  public $genero;

  /**
   * Método responsável por cadastrar uma nova Aluno no banco
   * @return boolean
   */
  
  public function cadastrar(){
    //DEFINIR A DATA
   $this->data_nascimento = date('Y-m-d H:i:s');
    $var = $this->data_nascimento;
   $date = str_replace('-', '/', $var);
   $result = date('d-m-Y', strtotime($date));

    //INSERIR o Aluno NO BANCO
    $obDatabase = new Database('alunos');
    $this->id = $obDatabase->insert([
                                      'nome'    => $this->nome,
                                      'apelido' => $this->apelido,
                                      'data_nascimento'     => $this->data_nascimento,
                                      'distrito_id'      => $this->distrito_id,
                                      'genero'      => $this->genero
                                    ]);
//     echo "<pre>" ; print_r($this); echo"</pre>"; exit;                              
    //RETORNAR SUCESSO
   return true;
  }


  /**
   * Método responsável por atualizar o Aluno no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('alunos'))->update('id = '.$this->id,[
                                                    'nome'    => $this->nome,
                                                    'apelido' => $this->apelido,
                                                    'data_nascimento'     => $this->data_nascimento,
                                                    'distrito_id'      => $this->distrito_id,
                                                    'genero'      => $this->genero
                                                              ]);
  }

  /**
   * Método responsável por excluir a Aluno do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('alunos'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as Alunos do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getAlunos($where = null, $order = null, $limit = null){
    return (new Database('alunos'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma Aluno com base em seu ID
   * @param  integer $id
   * @return Aluno
   */
  public static function getAluno($id){
    return (new Database('alunos'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

  public static function get_by_province($where = null, $order = null, $limit = null){
    return (new Database('alunos'))->select_province($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }
}