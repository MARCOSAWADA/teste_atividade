<?php
require_once './Usuario.php';
require_once './Teste.php';

class UsuarioTest extends Test {

    public function cadastroTest() {
        $usuario = new Usuario();
        $usuario->nome = "Aluno";
        $usuario->email = "aluno@aluno.com";
        $usuario->senha = "12345";
        $usuario->cpf = "12345678901";
        $usuario->telefone = "67987654321";
        $usuario->nascimento = "2000-12-12";

        // Testando cadastro
        $resultado = $usuario->cadastrar();
        $this->isTrue($resultado, "Falha ao cadastrar o usuário no banco de dados.");
    }

    public function atualizarSenhaTest() {
        $usuario = new Usuario();
        $usuario->id = 1;
        $usuario->senha = "vaca e o frango";


        $resultado = $usuario->atualizarSenha();
        $this->isTrue($resultado, "Falha ao atualizar a senha.");
    }
}


$UsuarioTest = new UsuarioTest();
$UsuarioTest->atualizarSenhaTest();
?>
