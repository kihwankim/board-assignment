<?php namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model 
{
    protected $table = 'board';
    protected $primaryKey = 'id';

    protected $createField = 'create_at';
    protected $updateField = 'update_at';

    protected $allowedFields = ['title', 'writer', 'description'];
}
?>