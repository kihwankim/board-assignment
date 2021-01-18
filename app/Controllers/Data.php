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
		$boards = $boardModel->orderBy('id', 'DESC')->paginate($this->eachPageNumber);
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
			$data['board'] = $board;
		}

		return $this->respond($data);
    }
    
    public function removeById($id)
	{
 		$boardModel = new BoardModel();
		$boardData = $boardModel->find($id);
		if($boardData){
			$boardModel->delete($id);
			return $this->respondDeleted('delete well');
		}
		
		return $this->failNotFound('this id is not found');
	}

	public function editBoardData()
	{
		$boardModel = new BoardModel();
		$result = $boardModel->save($_POST);
		if($result)
		{
			return $this->respondCreated($result);
		}
		throw new \CodIgniter\Database\Exception\DatabaseException();
	}
}
?>