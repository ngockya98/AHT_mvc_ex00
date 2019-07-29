<?php 
namespace AHT\Core;

use AHT\Core\ResourceModelInterface;
use AHT\Config\Database;

class ResourceModel implements ResourceModelInterface
{
	protected $table;
	protected $id;
	protected $model;

	public function _init($table, $id, $model)
	{
		$this->table = $table;
		$this->id = $id;
		$this->model = new Model();
	}

	public function add($model)
	{
		$propertiesArray = $this->model->getProperties($model);

		$col = "";
		foreach ($propertiesArray as $key => $value) {
			$col = $col . $key . ",";
		}
		$col = rtrim($col);

		$val = "";
		foreach ($propertiesArray as $property) {
			if(is_numeric($property)) {
				$val = $val . $property . ',';
			} else {
				$val = $val . "'" . $property . "',";
			}
		}
		$val = rtrim($val);
		$sql = "INSERT INTO $this->table ($col) VALUES ($val)";
		$req = Database::getBdd()->prepare($sql);
		return $req->execute(); 
	}

	public function edit($model)
	{
		$propertiesArray = $this->model->getProperties($model);
		$id = $propertiesArray['id'];
		$values = "";
		foreach ($propertiesArray as $key => $value) {
			$values = $values . $key;
			if(is_numeric($value)) {
				$values = $values . "=" . $value . ",";
			} else {
				$values = $values . "='" . $value . "',";
			}
		}
		$values = rtrim($values);
		$sql = "UPDATE $this->table SET $values WHERE id=" . $id;
		$req = Database::getBdd()->prepare($sql);
		return $req->execute();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM $this->table WHERE id=" . $id;
		$req = Database::getBdd()->prepare($sql);
		return $req->execute();
	}

	public function get($id)
	{
		$sql = "SELECT * FROM $this->table WHERE id=" . $id;
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
		return $req->fetch();
	}

	public function getAll()
	{
		$sql = "SELECT * FROM $this->table";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
		return $req->fetchAll();
	}
}

