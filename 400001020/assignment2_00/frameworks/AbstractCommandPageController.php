<?php
namespace Quwius\Framework;

abstract class AbstractCommandPageController implements Command_Interface{
	protected $model = null;
	protected $view = null;

	public function setModel(Observable_Model $model){
		$this->model = $model;
	}

	public function setView(View $view){
		$this->view = $view;
	}
	abstract public function run();
	abstract public function execute(CommandContext $context) :bool;

}
?>