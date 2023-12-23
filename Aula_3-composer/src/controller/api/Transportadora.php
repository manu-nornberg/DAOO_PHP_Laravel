<?php

namespace Emanu\Aula3Composer\controller\api;

use Emanu\Aula3Composer\model\Transportadora as TransportadoraModel;
use Exception;

class Transportadora extends Controller
{
    private TransportadoraModel $model;

    public function __construct(){
        try{
            $this->model = new TransportadoraModel();
        }catch (Exception $error){
            $this->setHeader(500,"Erro ao conectar");
            json_encode(["error" => $error->getMessage()]);
        }
    }

    public function index(){
        echo json_encode($this->model->read());
    }

    public function show($id){
        $transportadora = $this->model->read($id);
        if($transportadora){
            $response = ['transportadora' => $transportadora];
        }else {
            $response = ['Erro' => 'Trnasportadora não encontrada'];
            header('HTTP/1.0 404 Not Found');
        }
        echo json_encode($response);
    }

    public function store(){
        try{
            $this->validateTransportadoraRequest();
            $this->model = new TransportadoraModel(
                $_POST['nome'],
                $_POST['cidade'],
                $_POST['telefone']
            );

            if ($this->model->create()) {
                echo json_encode([
                    "success" => "Transportadora cadastrada com sucesso!",
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
                throw new Exception("Informe o ID !!");

            $this->validateTransportadoraRequest();

            $this->model = new TransportadoraModel(
                $_POST['nome'],
                $_POST['cidade'],
                $_POST['telefone']
            );
            $this->model->id = $_POST["id"];

            if ($this->model->update())
                echo json_encode([
                    "success" => "Transportadora atualizada com sucesso!",
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
                $response = ["message:" => "Transportadora id:$id removida com sucesso!"];
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

    private function validateTransportadoraRequest()
    {
        $fields = [
            'nome',
            'cidade'
        ];
        if (!$this->validatePostRequest($fields))
            throw new \Exception('Erro: campos imcompletos!');
    }


}