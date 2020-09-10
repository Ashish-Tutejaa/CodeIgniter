<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StationModels;

class Show extends Controller
    {
    public function index()
        {
        $model = new StationModels();
        $energies = $model -> findColumn('ENERGY');
        $sum = 0;
        if($energies === null)
            {
            echo "<h1>No data to show...</h1>";
            }
        else 
            {
            foreach($energies as $energy)
                $sum += $energy;
            $data['all'] = $model -> getData();
            $data['title'] = 'Database Contents: ';
            $data['sum'] = $sum;
            $data['css'] = 'show';
            $data['js'] = 'show';
            // $this->load->helper('url'); 
            echo view('pages/header',$data);
            echo view('pages/show',$data);
            echo view('pages/footer');
            }

        }
    }

?>