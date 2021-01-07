<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();

        $query = $db->query('SELECT * FROM topic');
		$results = $query->getResult();
		echo 'db connection test<br/>';
        foreach($results as $row)
        {
			echo $row->id;
			echo $row->title;
			echo "<br/>";
		}
	}

	public function board()
	{
		echo view('head');
		echo view('board');
		echo view('footer');
	}
}
