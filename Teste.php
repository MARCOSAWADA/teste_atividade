<?php

abstract class Test {

    public function isTrue($valor, $mensagem = "") {
        if ($valor != true) {
            throw new Exception("Falhou no teste. O valor esperado era True; {$mensagem}");
        } else {
            echo "Passou no teste: é True;\n";
        }
    }


    public function isString($valor) {
        if (!is_string($valor)) {
            throw new Exception("Falhou no teste. O valor esperado era String;");
        } else {
            echo "Passou no teste: é uma String;\n";
        }
    }
}

?>
