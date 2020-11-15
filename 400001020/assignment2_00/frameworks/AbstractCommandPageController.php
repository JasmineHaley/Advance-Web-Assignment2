<?php
namespace Quwius\Framework;

abstract class AbstractCommandPageController implements Command_Interface{
	protected $model = null;
	protected $view = null;

	abstract protected function makeModel() :Observable_Model;
	abstract protected function makeView() :View;
	
	abstract public function run();
	abstract public function execute(CommandContext $context) :bool;

}
?>