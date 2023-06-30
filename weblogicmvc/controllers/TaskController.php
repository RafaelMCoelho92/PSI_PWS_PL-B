<?php
require_once 'models/Auth.php';
require_once 'Controller.php';
require_once 'models/Task.php';

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizationFilter(['Funcionario', 'Admin',]);

    }
    public function index()
    {
        $auth = new Auth();
        $id = $auth->getId();

           $user = User::find($id);
            $this->renderView('task', 'index', ['tasks' => $user->tasks], 'default');

    }
    public function create()
    {
        $this->renderView('task', 'create');
    }
    public function store()
    {
        // Receber os dados do formulário de criação, validar e persistir no BD
        $task = new Task($this->getHTTPPost());
        $auth = new Auth();
        $id = $auth->getId();
        $task->done = 'Não';
        $task->user_id = $id;
        if ($task->is_valid()) {
            $task->save();
            $this->redirectToRoute('task', 'index');
        } else {
            $this->renderView('task', 'create', ['task' => $task]);
        }
    }
    public function show($id)
    {
        // Mostrar vista com detalhes
        $task = Task::find($id);
        if (is_null($task)) {
            // Redirecionar ou exibir mensagem de erro
        } else {
            $this->renderView('task', 'show', ['task' => $task]);
        }
    }
    public function edit($id)
    {
        // Mostrar a vista com formulário de edição de um registo identificado pelo seu ID
        $task = Task::find($id);
        if (is_null($task)) {
            // Redirecionar ou exibir mensagem de erro
        } else {
            $this->renderView('task', 'edit', ['task' => $task]);
        }
    }
    public function update($id)
    {
        // Receber os dados do formulário de edição de um registo identificado pelo seu ID, validar e persistir no BD
        $task = Task::find($id);
        $task->update_attributes($this->getHTTPPost());
        if ($task->is_valid()) {
            $task->save();
            $this->redirectToRoute('task', 'index');
        } else {
            $this->renderView('task', 'edit', ['task' => $task]);
        }
    }
    public function delete($id)
    {
        $task = Task::find($id);
    
        if ($task->is_valid()) {
                $task->delete();
                $this->redirectToRoute('task', 'index');
            }
         else {
            $this->redirectToRoute('task', 'index');
        }
    }
}