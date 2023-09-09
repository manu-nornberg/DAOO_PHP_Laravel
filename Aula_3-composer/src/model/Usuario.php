<?php

namespace Emanu\Aula3Composer\model;

use Exception;
class Usuario extends Model implements iDAO
{
    private $id, $nome, $cpf, $email, $status;

    public function __construct(
        $nome = '',
        $cpf = '',
        $email = '',
        $status = ''
    )
    {
        try {
            parent::__construct();
        } catch (Exception $error) {
            throw $error;
        }

        $this->table = "usuario";
        $this->primary = "id";
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->status = $status;
        $this->mapColumns($this);
    }

    public function read($id = null)
    {
        try {
            if (isset($id)) {
                return $this->selectById($id);
            }
            return $this->select();

        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            throw new Exception($error->getMessage());

        }
    }

    public function create()
    {
        try {
            $sql = "INSERT INTO $this->table ($this->columns)"
                ."VALUES ($this->params)";

            error_log(print_r([
                'colunas'=>$this->columns,
                'param'=>$this->params,
                'valores'=>$this->values,
                'SQL'=>$sql
            ], true));

            $prepStmt = $this->conn->prepare($sql);
            $result = $prepStmt->execute($this->values);

            if(!$result || $prepStmt->rowCount() != 1) {
                throw new Exception("Erro ao inserir!!");
            }

            $this->id = $this->conn->lastInsertId();
            $this->dumpQuery($prepStmt);
            return true;

        }catch(Exception $error){
            throw new Exception($error->getMessage());
        }
    }

    public function update()
    {
        try {
            $this->values[':id'] = $this->id;
            $sql = "UPDATE $this->table SET $this->updated
                  WHERE $this->primary = :id";
            $prepStmt = $this->conn->prepare($sql);

            if ($prepStmt->execute($this->values)) {
                $this->dumpQuery($prepStmt);
                return $prepStmt->rowCount() > 0;
            }
        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $prepStmt = $this->conn->prepare($sql);
        if ($prepStmt->execute([':id' => $id]))
            return $prepStmt->rowCount() > 0;
        else return false;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        if ($name != 'id') $this->mapColumns($this);
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function getColumns(): array
    {
        $columns = [
            "nome" => $this->nome,
            "cpf" => $this->cpf,
            "email" => $this->email,
            "status" => $this->status
        ];
        if($this->id) $columns['id']=$this->id;
        return $columns;

    }
}