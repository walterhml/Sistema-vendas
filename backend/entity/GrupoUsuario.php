<?php
class GrupoUsuario {
    // Propriedades
    private $GrupoUsuarioid;
    private $nome;
    private $descricao;
    private $dataCriacao;
    private $dataAtualizacao;
    private $ativo;

    // Método Construtor
    public function __construct($GrupoUsuarioid, $nome, $descricao, $dataCriacao, $dataAtualizacao, $ativo) {
        $this->GrupoUsuarioid = $GrupoUsuarioid;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dataCriacao = $dataCriacao;
        $this->dataAtualizacao = $dataAtualizacao;
        $this->ativo = $ativo;
    }

    // Getters
    public function getGrupoUsuarioId() {
        return $this->GrupoUsuarioid;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataCricao() {
        return $this->dataCriacao;
    }

    public function getDataAtualizacao() {
        return $this->dataAtualizacao;
    }

    public function getAtivo() {
        return $this->ativo;
    }
    // Setters
}
?>