<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskRepository;
use AHT\Models\Task;
class TaskController extends Controller
{
    function index()
    {
        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $task = new TaskRepository();

            $objTask = new Task();
            $objTask->setTitle($_POST["title"]);
            $objTask->setDescription($_POST["description"]);
            $objTask->setCreatedAt(date("Y-m-d H-i-s"));
            $objTask->setUpdatedAt(date("Y-m-d H-i-s"));
            
            if ($task->add($objTask))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task= new TaskRepository();

        $d["task"] = $task->get($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d); 
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskRepository();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>