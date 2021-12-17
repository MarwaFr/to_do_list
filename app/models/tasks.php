<?php

//on charge le fichier mère du modèle
require "app/core/model.php";

//classe TasksModel instanciée de la classe Model
class TasksModel extends Model {

    //initialisation de la classe
	public function __construct() {
		parent::__construct();
	}

    //on récupère la liste des taches de la base de données
	public function get_tasks() {
		return $this->select("SELECT * FROM tasks");
		
	}
	public function get_task($id)
	{
		return $this->select("SELECT * FROM tasks WHERE id='".$id."'");
	}
    //on insère une tache dans la base de données
	public function add_tasks($task) {
		$this->execute("INSERT INTO tasks (task) VALUES ('$task')");
	}

    //on met à jour une tache de la base de données
	public function update_tasks($id,$new_task) {
		$this->execute("UPDATE tasks SET task='$new_task',date=now() WHERE id='$id'");
	}
	public function update_tasks2($id,$checked) {
		$this->execute("UPDATE tasks SET checked='$checked' WHERE id='$id'");
	}

    //on supprime une tache de la base de données
	public function delete_tasks($id) {
		$this->execute("DELETE FROM tasks WHERE id='$id' LIMIT 1");
		
	}
}
?>
