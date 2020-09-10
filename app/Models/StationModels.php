<?php
namespace App\Models;
use CodeIgniter\Model;

class StationModels extends Model
    {
    protected $table = 'stations';
    protected $allowedFields = ['ID', 'ST_NAME', 'ENERGY'];
    public function getData()
        {
        return $this -> findAll();
        }
    }

?>