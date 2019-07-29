<?php 
namespace AHT\Models;

use AHT\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
	public function __construct()
	{
		self::_init('tasks', uniqid(), new Task());
	}
}
