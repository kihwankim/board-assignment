<?php namespace App\Controllers;

// use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\API\ResponseTrait;
use App\Models\BoardModel;

class Home extends BaseController
{
	public function index() {
		return view('board');
	}

	public function getBoardDataById($id)
	{
		return view('board_view');
	}

	public function writeBoardPage()
	{
		return view('write');
	}

	public function modifyDataPage($id)
	{
		return view('write_fix');
	}
}
