<?php namespace App\Controllers;

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
}
