<?php

namespace Emanu\Aula3Composer\controller\api;

use Emanu\Aula3Composer\model\Usuario as UsuarioModel;

class Usuario extends Controller
{
    private UsuarioModel $model;

    public function __construct()
    {
        try {
            $this->model = new UsuarioModel();
        } catch (Exception $error) {
            $this->setHeader(500, "Erro ao conectar ao banco!");
            json_encode(["error" => $error->getMessage()]);
        }
    }

    public function index()
    {
        echo json_encode($this->model->read());
    }

    public function show($id)
    {
        $usuario = $this->model->read($id);
        if ($usuario) {
            $response = ['usuario' => $usuario];
        } else {
            $response = ['Erro' => "Usuario não encontrado"];
            header('HTTP/1.0 404 Not Found');
        }
        echo json_encode($response);
    }

    public function store()
    {
        try {
            $this->validateUsuarioRequest();

            $this->model = new UsuarioModel(
                $_POST['nome'],
                $_POST['cpf'],
                $_POST['email'],
                $_POST['status']
            );

            // error_log(print_r($this->model,TRUE));
            // throw new \Exception('LOG');

            if ($this->model->create()) {
                echo json_encode([
                    "success" => "Usuario criado com sucesso!",
                    "data" => $this->model->getColumns()
                ]);
            } else {
                $msg = 'Erro ao cadastrar!';
                $this->setHeader(500, $msg);
                throw new (Exception($msg));
            }
        } catch (\Exception $error) {
            echo json_encode([
                "error" => $error->getMessage(),
                "trace" => $error->getTrace()
            ]);
        }
    }

    public function update()
    {
        try {
            if (!$this->validatePostRequest(['id']))
                throw new Exception("Informe o ID do Produto!!");

            $this->validateUsuarioRequest();

            $this->model = new UsuarioModel(
                $_POST['nome'],
                $_POST['cpf'],
                $_POST['email']
            );
            $this->model->id = $_POST["id"];

            if ($this->model->update())
                echo json_encode([
                    "success" => "Usuario atualizado com sucesso!",
                    "data" => $this->model->getColumns()
                ]);
            else throw new \Exception("Erro ao atualizar!");
        } catch (\Exception $error) {
            $this->setHeader(500, 'Erro interno do servidor!!!!');
            echo json_encode([
                "error" => $error->getMessage()
            ]);
        }
    }

    public function remove()
    {
        try {
            if (!isset($_POST["id"])) {
                $this->setHeader(400, 'Bad Request.');
                throw new \Exception('Erro: id obrigatorio!');
            }
            $id = $_POST["id"];
            if ($this->model->delete($id)) {
                $response = ["message:" => "Usuario id:$id removido com sucesso!"];
            } else {
                $this->setHeader(500, 'Internal Error.');
                throw new Exception("Erro ao remover!");
            }
            echo json_encode($response);
        } catch (\Exception $error) {
            echo json_encode([
                "error" => $error->getMessage()
            ]);
        }
    }

    private function validateUsuarioRequest()
    {
        $fields = [
            'nome',
            'cpf',
            'email',
            'status'
        ];
        if (!$this->validatePostRequest($fields))
            throw new \Exception('Erro: campos imcompletos!');
    }
}