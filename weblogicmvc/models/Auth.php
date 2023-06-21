<?php
class Auth
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    function checkAuth($username, $password)
    { // ter atenção e começar funçao com minuscula
        // verificar se a sessao ja foi iniciada com o isset
        if (!isset($_SESSION)) {
            // Inicia a sessão apenas se ela ainda não tiver sido iniciada
            session_start();
        }
        $user = User::find_by_username_and_password($username, $password); // se devolver algo colocar na variavel de session, dai buscar o role 
        if ($user !== null) {
            $_SESSION["id"] = $user->id;
            $_SESSION["username"] = $user->username;
            $_SESSION["role"] = $user->role;
            return true;
        } else {
            return false;
        }
    }
    function isLoggedIn()
    {
        //iniciar sessão caso n esteja iniciada
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["username"])) {
            return true; // return role e switch do outro lado
        } else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
    function logout()
    {

        session_destroy();
    }

    public function getRole()
    {
        return $_SESSION['role'];
    }
    public function getUsername()
    {
        return $_SESSION['username'];
    }
    public function getId()
    {
        return $_SESSION['id'];
    }
    public function isLoggedInAs($rolesPermitidos = [])
    {
        if ($this->isLoggedIn()) {
            $role = $this->getRole();
            return in_array($role, $rolesPermitidos);
        }
    }
}
