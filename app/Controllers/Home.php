<?php namespace App\Controllers;

use App\Models\BoardModel;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'meta_title' => 'Board Main Page',
			'title' => 'Board Main Page',
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
