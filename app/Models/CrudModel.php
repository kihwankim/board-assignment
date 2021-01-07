<?php
namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model 
{
    protected $table = 'topic';
    protected $primaryKe = 'id';
    protected $allowedFileds = ['title', 'description', 'created'];
}
?>