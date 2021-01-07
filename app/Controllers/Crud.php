<?php
namespace App\Controllers;
// use App\Models\UserModel;
// use CodeIgniter\Controller;

class Crud extends BaseController
{
    public function index()
    {
        // $userModel = new UserModel();
        // $data['users'] = $userModel->orderBy('id', 'DESC') -> findAll();
        // return view('user_view', $data);

        $db = \Config\Database::connect();

        $query = $db->query('SELECT * FROM topic');
        $results = $query->getResult();
        foreach($results as $row)
        {
            echo $row->id;
        }
    }
}
?>