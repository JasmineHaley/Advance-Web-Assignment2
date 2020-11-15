<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
class IndexController extends AbstractCommandPageController{
	private $data = null;
	protected function makeModel () :Observable_Model{
		return new \IndexModel();
	}

	protected function makeView() : View{
		$v = new View();
		$v->setTemplate(TPL_DIR. '/index.tpl.php');
		return $v;
	}
	public function run(){

		
		$this->model = $this->makeModel();
		 $this->view = $this->makeView();
		
		
		$this->model->attach($this->view);
		$data=$this->model->findAll();

		$this->model->updateData($data);
		//tells the model to contact its observers
		$this->model->notify();

	}
	public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}
?>