<?php namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model 
{
    protected $table = 'board';
    protected $primaryKey = 'id';
    
    protected $useTimestamps = false;
    protected $createField = 'created_at';
    protected $updateField = 'updated_at';

    protected $allowedFields = ['title', 'writer', 'description', 'pw'];

    protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert(array $data)
    {
        return $this->passwordHash($data);
    }

    protected function passwordHash(array $data)
    {
        $data['data']['pw'] = password_hash($data['data']['pw'], PASSWORD_BCRYPT);

        return $data;
    }
}
?>