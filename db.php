<?php

class Aluno {
    private $conn;   
    private $host = "mysql.jrcf.dev";
    private $db = "escola";
    private $user = "usrapp";
    private $pass = "010203";
    
    public function __construct() {
        // Criar conexão com o banco de dados
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Verificar se houve erro na conexão
        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }
    
    // Método para adicionar um novo produto
    public function adicionarAluno($nome, $email) {
        $sql = "INSERT INTO alunos (nome, email) VALUES (?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $nome, $email);
            if ($stmt->execute()) {
                echo "Aluno adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar o aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para listar todos os produtos
    public function listarAluno() {
        $sql = "SELECT * FROM alunos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $aluno = [];
            while ($row = $result->fetch_assoc()) {
                $aluno[] = $row;
            }
            return $aluno;
        } else {
            return [];
        }
    }

    // Método para alterar um produto
    public function alterarAluno($id, $nome, $email) {
        $sql = "UPDATE aluno SET nome = ?, email = ?, WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdii", $nome, $email, $id);
            if ($stmt->execute()) {
                echo "Aluno atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o Aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para excluir um produto
    public function excluirProduto($id) {
        $sql = "DELETE FROM alunos WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Aluno excluído com sucesso!";
            } else {
                echo "Erro ao excluir o Aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Fechar a conexão com o banco de dados
    public function fecharConexao() {
        $this->conn->close();
    }
}
?>
