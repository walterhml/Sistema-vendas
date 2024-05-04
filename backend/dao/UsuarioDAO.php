<?php

require_once 'config/Database.php';
require_once 'entity/Usuario.php';
require_once 'BaseDAO.php';

class UsuarioDAO implements BaseDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getById($id)
    {
        try {
            // Preparar a consulta SQL
            $sql = "SELECT * FROM Usuario WHERE Id = :id";

            // Preparar a instrução
            $stmt = $this->db->prepare($sql);

            // Vincular parâmetros
            $stmt->bindParam(':id', $id);

            // Executa a instrução
            $stmt->execute();

            // Obtem o usuario encontrado;
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retorna o usuário encontrado
            return $usuario ?
                new Usuario(
                    $usuario['Id'],
                    $usuario['NomeUsuario'],
                    $usuario['Senha'],
                    $usuario['Email'],
                    $usuario['GrupoUsuarioID'],
                    $usuario['Ativo'],
                    $usuario['DataCriacao'],
                    $usuario['DataAtualizacao']
                )
                : null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getAll()
    {
        try {
            // Preparar a consulta SQL
            $sql = "SELECT * FROM Usuario";

            // Preparar a instrução
            $stmt = $this->db->prepare($sql);

            // Executa a instrução
            $stmt->execute();

            // Obtem o usuario encontrado;
            $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);

            return array_map(function ($usuario) {
                return new Usuario(
                    $usuario['Id'],
                    $usuario['NomeUsuario'],
                    $usuario['Senha'],
                    $usuario['Email'],
                    $usuario['GrupoUsuarioID'],
                    $usuario['Ativo'],
                    $usuario['DataCriacao'],
                    $usuario['DataAtualizacao']
                );
            }, $usuarios);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function create($usuario) {
        try {
            // Preparar a consulta SQL
            $sql = "INSERT INTO Usuario( NomeUsuario , Senha , Email , GrupoUsuarioID , Ativo , DataCriacao , DataAtualizacao , UsuarioAtualizacao )
                    VALUES(:nomeUsuario, :senha, :email, :grupoUsuarioID, :ativo, current_timestamp(),current_timestamp(),null)";

        $stmt = $this->db->prepare($sql);
    
        $stmt->bind_param(':nomeUsuario', $usuario->getNomeUsuario());
        $stmt->bind_param(':senha', $usuario->getSenha());
        $stmt->bind_param(':email', $usuario->getEmail());
        $stmt->bind_param(':grupoUsuarioID', $usuario->getGrupoUsuarioId());
        $stmt->bind_param(':ativo', $usuario->getAtivo());
        
        $stmt->execute();


        } catch (PDOException $e) {
            // TO-DO: implementar log
            return false;
        }
    }

    public function update($entity)
    {
    }

    public function delete($id)
    {
    }
}
