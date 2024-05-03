<?php
require_once 'config/Database.php';
require_once 'entity/Usuario.php';
require_once 'BaseDAO.php';

class UsuarioDAO implements baseDAO {
    
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    
    public function getById($id) {
        try {
        $sql = "SELECT * FROM Usuario WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);        
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario ?
         new Usuario($usuario['id'],
          $usuario['NomeUsuario'],
           $usuario['Senha'],
            $usuario['Email'],
             $usuario['GrupoUsuarioID'],
              $usuario['ativo'],
               $usuario['DataCriacao'],
                $usuario['DataAtualizacao'])
                :null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM Usuario";
            $stmt = $this->db->prepare($sql);    
            $stmt->execute();
            $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_map(function ($usuario) {
                return  new Usuario($usuario['id'],
                $usuario['NomeUsuario'],
                 $usuario['Senha'],
                  $usuario['Email'],
                   $usuario['GrupoUsuarioID'],
                    $usuario['ativo'],
                     $usuario['DataCriacao'],
                      $usuario['DataAtualizacao']);
                }, $usuarios);
            } catch (PDOException $e) {
                return null;
            }
    }

    public function create($entity) {

    }

    public function update($entity) {

    }

    public function delete($id) {

    }
}

?>