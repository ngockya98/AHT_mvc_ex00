<?php
namespace AHT\Models;

use AHT\Core\Model;

class Task extends Model
{
    protected $id;
    protected $title;
    protected $description;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
