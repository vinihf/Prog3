<?php
require_once getcwd()."\db\MySQL.class.php";

class Avaliacao{
    private $id;
    private $data;
    private $disciplina;
    private $conteudo;
    private $tipo;
    private $peso;

    public function __construct($id = null, $data = null, $disciplina = null, $conteudo = null, $tipo = null, $peso = null){
        $this->id = $id;
        $this->data = $data;
        $this->disciplina = $disciplina;
        $this->conteudo = $conteudo;
        $this->tipo = $tipo;
        $this->peso = $peso;    
    }
    
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function inserir(){
        $conexao = new MySQL();
        $sql = "insert 
                into avaliacoes (data, disciplina, conteudo, tipo, peso) 
                values
                ('".$this->data."',".$this->disciplina.",'".$this->conteudo."',".$this->tipo.",".$this->peso.")";
        $conexao->executa($sql);
    }

    public static function listaTodos(){
        $conexao = new MySQL();
		$sql = "SELECT * FROM avaliacoes";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $avaliacoes = array();
            foreach($resultados as $resultado){
                $avaliacao = new Avaliacao();
                $avaliacao->id = $resultado['id'];
                $avaliacao->data = $resultado['data'];
                $avaliacao->disciplina = $resultado['disciplina'];
                $avaliacao->conteudo = $resultado['conteudo'];
                $avaliacao->tipo = $resultado['tipo'];
                $avaliacao->peso = $resultado['peso'];
                $avaliacoes[] = $avaliacao;
            }
            return $avaliacoes;
        }else{
            return false;
        }
    }

    public function listaUm(){
        $conexao = new MySQL();
		$sql = "SELECT * FROM avaliacoes where id =".$this->id ;
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $this->data = $resultados[0]['data'];
            $this->disciplina = $resultados[0]['disciplina'];
            $this->conteudo = $resultados[0]['conteudo'];
            $this->tipo = $resultados[0]['tipo'];
            $this->peso = $resultados[0]['peso'];
        }
    }

    public static function listaPorDisciplina($idDisciplina){
        $conexao = new MySQL();
		$sql = "SELECT * FROM avaliacoes WHERE disciplina  = ".$idDisciplina;
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $avaliacoes = array();
            foreach($resultados as $resultado){
                $avaliacao = new Avaliacao();
                $avaliacao->id = $resultado['id'];
                $avaliacao->data = $resultado['data'];
                $avaliacao->disciplina = $resultado['disciplina'];
                $avaliacao->conteudo = $resultado['conteudo'];
                $avaliacao->tipo = $resultado['tipo'];
                $avaliacao->peso = $resultado['peso'];
                $avaliacoes[] = $avaliacao;
            }
            return $avaliacoes;
        }else{
            return false;
        }
    }

    public static function excluir($id){
        $conexao = new MySQL();
        $sql = "DELETE FROM avaliacoes where id =".$id;
        $conexao->executa($sql);
    }

    public function editar(){
        $conexao = new MySQL();
        $sql = "UPDATE avaliacoes SET data = '".$this->data."',disciplina ='".$this->disciplina."',conteudo='".$this->conteudo."',tipo = '".$this->tipo."',peso = '".$this->peso."'  
        where id =".$this->id;
        $conexao->executa($sql);
    }
}