<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskRepository;
use AHT\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["title"]))
        {
            $task = new TaskRepository();
            $objTask = new Task();
            $objTask->setTitle($this->convertToString($_POST["title"]));
            $objTask->setDescription($this->convertToString($_POST["description"]));
            $objTask->setCreatedAt($this->convertToString(date("Y-m-d H-i-s")));
            $objTask->setUpdatedAt($this->convertToString(date("Y-m-d H-i-s")));
            $task->add($objTask);
            header("Location: " . WEBROOT . "task/index");
        }
        $this->render("create");
    }

    public function edit($id)
    {
        $task = new TaskRepository();
        $d["task"] = $task->get($id);
        if (isset($_POST["title"]))
        {
            $objTask = new Task();
            $objTask->setId($id);
            $objTask->setTitle($this->convertToString($_POST["title"]));
            $objTask->setDescription($this->convertToString($_POST["description"]));
            $objTask->setCreatedAt($this->convertToString($d['task']['created_at']));
            $objTask->setUpdatedAt($this->convertToString(date("Y-m-d H-i-s")));
            $task->edit($objTask);
            header("Location: " . WEBROOT . "task/index");        
        }
        $this->set($d); 
        $this->render("edit");
    }

    public function delete($id)
    {
        $task = new TaskRepository();
        $task->delete($id);
        header("Location: " . WEBROOT . "task/index");
    }
}
?>