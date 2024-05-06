<?php
    require_once("template/header.php");
    require_once 'dao/UsuarioDAO.php';
    require_once 'entity/Usuario.php';

    $usuarioDao = new UsuarioDAO();
    // print_r($usuarioDao->getAll());

    $novoUsuario = new Usuario(null, "novo usuario", "1334senha", "novouser@mail.com", null);
    
    $usuarioDao->create($novoUsuario);

?>
    <h1>Olá Sistema Vendas Body</h1>
</body>

<?php
    require_once("template/footer.php");
?>