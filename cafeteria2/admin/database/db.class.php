<?php

class db
{
    // Configurações do Laragon
    private $host     = 'localhost';
    private $user     = 'root';
    private $password = '';
    private $port     = '3306';
    private $dbname   = 'db_pweb1_2026_1'; // Nome do seu banco no HeidiSQL
    private $table_name;
    private $conn;

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $this->conn = $this->connect();
    }

    private function connect()
    {
        try {
            // Cria a conexão usando PDO
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            // Se houver erro de senha, nome de banco ou porta, ele avisará aqui
            die('Erro crítico na conexão: ' . $e->getMessage());
        }
    }

    // Método para buscar todos os dados (SELECT *)
    public function all()
    {
        $sql = "SELECT * FROM $this->table_name";
        $st = $this->conn->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    // Método para buscar apenas um registro por ID
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table_name WHERE id = ?";
        $st = $this->conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchObject();
    }

    // Método para inserir dados (INSERT INTO)
    public function store($dados)
    {
        $campos = "";
        $marcadores = "";
        $vetorData = [];
        $sep = "";

        foreach ($dados as $campo => $valor) {
            $campos .= $sep . $campo;
            $marcadores .= $sep . "?";
            $vetorData[] = $valor;
            $sep = ",";
        }
        
        $sql = "INSERT INTO $this->table_name ($campos) VALUES ($marcadores)";

        try {
            $st = $this->conn->prepare($sql);
            $st->execute($vetorData);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar: " . $e->getMessage());
        }
    }

    // Método para deletar dados (DELETE)
    public function destroy($id)
    {
        try {
            $sql = "DELETE FROM $this->table_name WHERE id = ?;";
            $st = $this->conn->prepare($sql);
            $st->execute([$id]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao deletar: " . $e->getMessage());
        }
    }

    // Método para busca/pesquisa funcional
    public function search($dados)
    {
        $campo = $dados['tipo'];
        $valor = $dados['valor'];
        
        $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";

        try {
            $st = $this->conn->prepare($sql);
            $st->execute(["%$valor%"]);

            return $st->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            throw new Exception("Erro na pesquisa: " . $e->getMessage());
        }
    }
}