<?php  
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
use Quwius\Framework\SessionManager;
class LogOutController extends AbstractCommandPageController{
	private $data = null;
	protected function makeModel () :Observable_Model{
		return new Observable_Model();
	}

	protected function makeView() : View{
		$v = new View();
		
		return $v;
	}
	public function run(){

		SessionManager::create();
			$session = new SessionManager();
			$session->destroy();
			header('Location: index.php');

	}
	public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}
?>