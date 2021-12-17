<?php

//on charge le fichier mère du controlleur
require "app/core/controller.php";
//on charge le fichier modèle des taches
require "app/models/tasks.php";

//classe TasksController instanciée de la classe Controlleur
class TasksController extends Controller {

	private $tasks;
	
    //initialisation de la classe
	public function __construct() {
		parent::__construct();

		//initialisation de la classe modèle des taches
		$this->tasks = new TasksModel();
	}
	

	
	private function render() {
		
		$this->view->render("tasks", [
                "title" => "CRUD MVC en PHP - Taches",
                "tasks" => $this->tasks->get_tasks() //on récupère la liste des taches de la base de données
			
            ]
        );
	}

    //on affiche la page tasks avec une variable title définie
	public function index() {
		$this->render();
	}

    //on affiche la page tasks avec une variable title définie
	public function add_tasks($task) {
		$this->tasks->add_tasks($task);
		$this->render(); //on actualise la page
	}

    //on affiche la page tasks avec une variable title définie
	public function update_tasks($id,$new_task) {
		$this->tasks->update_tasks($id,$new_task);
		$this->render();  //on actualise la page
	}
	public function update_tasks2($id,$checked) {
		$this->tasks->update_tasks2($id,$checked);
		$this->render();  //on actualise la page
	}

    //on affiche la page tasks avec une variable title définie
	public function delete_tasks($id) {
		$this->tasks->delete_tasks($id);
		$this->render(); //on actualise la page
	}
}
?>
