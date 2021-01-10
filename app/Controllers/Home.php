<?php namespace App\Controllers;

use App\Models\BoardModel;

class Home extends BaseController
{
	private $eachPageNumber = 10;
	private $pagiPath = 'version4/public/index.php/home';

	public function index()
	{
		$boardModel = new BoardModel();
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
			'meta_title' => 'Board Main Page',
			'title' => 'Board Main Page',
			'boards' => $boards,
			'pager' => $pager,
		];

		return view('board', $data);
	}

	public function getBoardDataById($id)
	{
		$boardModel = new BoardModel();
		$board = $boardModel->find($id);

		$data = [
			'meta_title' => 'write board page',
			'title' => 'write board page',
		];				

		if($board){
			$data['board'] = $board;
		}

		return view('board_view', $data);
	}

	public function writeBoardPage()
	{
		$data = [
			'meta_title' => 'write board page',
			'title' => 'write board page',
		];

		return view('write', $data);
	}

	public function writeBoard()
	{
		if($this->request->getMethod() == 'post')
		{
			$boardModel = new BoardModel();
			$boardModel->save($_POST);
		}
		return redirect()->to('/version4/public/index.php/home');
	}
}
