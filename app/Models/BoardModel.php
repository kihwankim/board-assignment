<?php namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model 
{
    protected $table = 'board';
    protected $primaryKey = 'id';
    
    protected $useTimestamps = true;
    protected $createField = 'created_at';
    protected $updateField = 'updated_at';

    protected $allowedFields = ['title', 'writer', 'description'];
}
?>