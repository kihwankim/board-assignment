<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BoardModel;


class Data extends ResourceController
{
    use ResponseTrait;

	private $eachPageNumber = 10;
	private $pagiPath = 'version4/public/index.php/home';

	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");$boardModel = new BoardModel();
		$boards = $boardModel->paginate($this->eachPageNumber);
		$pager = $boardModel->pager;
		$pager->setPath($this->pagiPath);

		for($index = 0; $index < count($boards); $index += 1)
		{
			if(strlen($boards[$index]['title']) >= 20){
				$headStr = substr($boards[$index]['title'], 0, 20).'...';
				$boards[$index]['title'] = $headStr;
			}
		}

		$data = [
			'boards' => $boards,
			'pager' => $pager->links(),
		];

		return $this->respond($data);
	}

    public function new()
	{
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");$boardModel = new BoardModel();
		if($this->request->getMethod() == 'post')
		{
			$boardModel = new BoardModel();
			$boardModel->save($_POST);
		}
		return redirect()->to('/version4/public/index.php/home');
    }
    
    public function getBoardDataById($id)
	{
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");$boardModel = new BoardModel();

		$boardModel = new BoardModel();
		$board = $boardModel->find($id);

		if($board){
			$data['board'] = $board;
		}

		return $this->respond($data);
    }
    
    public function removeById($id)
	{
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");$boardModel = new BoardModel();

		$boardModel = new BoardModel();
		$boardData = $boardModel->find($id);
		if($boardData){
			$boardModel->delete($id);
		}
		
		return redirect()->to('/version4/public/index.php/home');
	}
}
?>