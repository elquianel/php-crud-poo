<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar vaga');

use \App\Entity\Vaga;

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: index.php?status=error");exit;
}

$vaga = Vaga::getVaga($_GET['id']);

//validação se a vaga existe
if(!$vaga instanceof Vaga){
    header("Location: index.php?status=error");exit;
}

if(isset($_POST['excluir'])){
    $vaga->excluir();
    // echo "<pre>";
    // print_r($_POST);exit;

    header("Location: index.php?status=success");exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusão.php';
include __DIR__.'/includes/footer.php';

