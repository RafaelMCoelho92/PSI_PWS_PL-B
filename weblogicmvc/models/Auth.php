<?php
class Auth{
     public function __construct(){
        if (!isset($_SESSION)) {
             session_start();
        }
    } 
function checkAuth($username, $password){ // ter atenção e começar funçao com minuscula
// verificar se a sessao ja foi iniciada com o isset
    if (!isset($_SESSION)) {
        // Inicia a sessão apenas se ela ainda não tiver sido iniciada
        session_start();
    }
    $validUser ="user";
    $validpass ="123";
    if($validUser == $username && $validpass == $password){
        $_SESSION["username"] = $username;
        return true;
    }else{
        return false;
    }
}
function isLoggedIn(){
    //iniciar sessão caso n esteja iniciada
    if (!isset($_SESSION)) {
        session_start();
    }
    // se eu comentar o if de cima da erro 
    if(isset($_SESSION["username"])){
        return true; // return role e switch do outro lado
    }else{
        header('Location: index.php?'.INVALID_ACCESS_ROUTE);
    }
} 
function logout(){

    session_destroy();
}
}

?>