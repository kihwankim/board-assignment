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
		$boardModel = new BoardModel();
		$pageNumber = $this->request->getVar("page");
		$boards = $boardModel->orderBy('updated_at, created_at', 'DESC')->paginate($this->eachPageNumber);
		$pager = $boardModel->pager;
		$pager->setPath($this->pagiPath);

		for($index = 0; $index < count($boards); $index += 1)
		{
			if(strlen($boards[$index]['title']) >= 20){
				$headStr = substr($boards[$index]['title'], 0, 20).'...';
				$boards[$index]['title'] = $headStr;
			}
			unset($boards[$index]['pw']);
		}

		$data = [
			'boards' => $boards,
			'pager' => $pager->links(),
			'pageNumber' => $pageNumber
		];

		return $this->respond($data);
	}

    public function createNewData()
	{
		$boardModel = new BoardModel();
		$result = $boardModel->insert($_POST);
		if($result)
		{
			return $this->respondCreated($result);
		}
		throw new \CodIgniter\Database\Exception\DatabaseException();
    }
    
    public function getBoardDataById($id)
	{
		$boardModel = new BoardModel();
		$board = $boardModel->find($id);

		if($board){
			unset($board['pw']);
			$data['board'] = $board;
		}

		return $this->respond($data);
    }
    
    public function removeById()
	{
		$id = $_POST['id'];
		$boardModel = new BoardModel();
		$boardData = $boardModel->find($id);
		if($boardData && password_verify($_POST['pw'], $boardData['pw']))
		{
			$boardModel->delete($id);
			return $this->respondDeleted('delete well');
		}
		
		return $this->failNotFound('this id is not found');
	}

	public function editBoardData()
	{
		$boardModel = new BoardModel();
		$beforeData = $boardModel->find($_POST['id']);
		if($beforeData && password_verify($_POST['pw'], $beforeData['pw']))
		{	
			$_POST['pw'] = $beforeData['pw'];
			$result = $boardModel->save($_POST);

			return $this->respondCreated($result);
		}
		throw new \CodIgniter\Database\Exception\DatabaseException();
	}
}
?>