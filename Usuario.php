<?php
require_once 'database.php';

class Usuario {
    private $conn;
    private $table_name = "cliente";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $telefone;
    public $nascimento;

    public function __construct() {

        $database = new DB();
        $this->conn = $database->getConnection();
    }


    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha, cpf, telefone, nascimento) 
                  VALUES (:nome, :email, :senha, :cpf, :telefone, :nascimento)";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':nascimento', $this->nascimento);

        // Executando a query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

  
    public function ler() {
        $query = "SELECT id, nome, email, senha, cpf, telefone, nascimento FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    public function atualizarSenha() {
        $query = "UPDATE " . $this->table_name . " SET senha = :senha WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

 
    public function deletar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
