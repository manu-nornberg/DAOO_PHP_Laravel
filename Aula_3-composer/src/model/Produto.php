<?php

namespace Emanu\Aula3Composer\model;

use Exception;

class Produto extends Model implements iDAO
{
    protected $id, $nome, $descricao, $preco;

    public function __construct(
        $nome = '',
        $descricao = '',
        $preco = ''
    )
    {
        try {
            parent::__construct();
        } catch (Exception $error) {
            throw $error;
        }

        $this->table = "produtos";
        $this->primary = 'idprod';
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
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
                throw new Exception("Erro ao inserir produto!!");
            }

            $this->id = $this->conn->lastInsertId();
            $this->dumpQuery($prepStmt);
            return true;

        }catch(Exception $error){
            throw new Exception($error->getMessage());
        }
    }

    public function update($id)
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
        // TODO: Implement delete() method.
    }

    public function getColumns(): array
    {
        $columns = [
            "nome" => $this->nome,
            "descricao" => $this->descricao,
            "preco" => $this->preco
        ];
        if($this->id) $columns['idprod']=$this->id;
        return $columns;
    }
}