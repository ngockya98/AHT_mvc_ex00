<?php  
namespace AHT\Models;

class TaskRepository
{
	public function add($model)
	{
		$objResourceModel = new TaskResourceModel();
		$objResourceModel->add($model);
	}

	public function edit($model)
	{
		$objResourceModel = new TaskResourceModel();
		$objResourceModel->edit($model);
	}

	public function delete($id)
	{
		$objResourceModel = new TaskResourceModel();
		$objResourceModel->delete($id);
	}

	public function get($id)
	{
		$objResourceModel = new TaskResourceModel();
		return $objResourceModel->get($id);
	}

	public function getAll()
	{
		$objResourceModel = new TaskResourceModel();
		return $objResourceModel->getAll();
	}
}
