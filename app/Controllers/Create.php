<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use App\Models\StationModels;

class Create extends Controller
    {
        public function __construct()
            {
                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: PUT");
                // parent::__construct();
            }

        public function index()
        {
            echo view('pages/form');
        }
        
        public function update($body= "nono")
        {
            // $this -> response -> setStatusCode(200);
            // $this -> response -> setHeader('Access-Control-Allow-Origin:', '*');
            // $this -> response -> setHeader('Access-Control-Allow-Methods', 'GET');
            // $this -> response -> setHeader('Access-Control-Allow-Headers', 'Content-Type');
            // $this -> response -> setBody("AWHSDIUAWHIWAE");
            // if($this -> request -> getMethod() === 'put')
            // {
                
                $model = new StationModels();
                $pieces = explode('-', $body);
                foreach($pieces as $piece)
                    {
                    echo $piece;
                    }
                $data['ID'] = $pieces[0];
                $data['ST_NAME'] = $pieces[2];
                $data['ENERGY'] = $pieces[1];
                $model->update($pieces[0] + 0, $data);
        }

    public function submitted()
        {
            
        if($this -> request -> getMethod() === "post")
            {
            $file = $this -> request -> getFile('myfile'); 
            if(! $file -> isValid() || $file -> getExtension() !== 'xlsx')
                throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
            //D:\php\projects\AER\temporaryFiles
            $file->move('D:\php\projects\AER\uploads');
            $ext = $file -> getExtension();
            $name = $file -> getName();
            // echo "D:\php\projects\AER\uploads"."\\".$name."<br/>";
            // echo "<br/>".$ext."<br/>";
            $reader = ReaderEntityFactory::createReaderFromFile("D:\php\projects\AER\uploads"."\\".$name);
            $reader -> open("D:\php\projects\AER\uploads"."\\".$name);
            $model = new StationModels();
            /* 
                $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
                'body'  => $this->request->getPost('body'),
            ]);
            */
            $id = 0;
            echo "<h1>The information below has been added to the database!</h1>";
            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $row) {
                    // do stuff with the row
                    if($id !== 0)
                        {
                        $cells = $row->getCells();
                        $model -> save([
                            'ID' => $id,
                            'ST_NAME' => $cells[0],
                            'ENERGY' => $cells[1]
                        ]);
                        echo $cells[0];
                        echo $cells[1];
                        echo "<br/>";
                    }
                    $id++;

                }
            }
            echo "SUCCESS";
            }
        else 
            {
            echo "FAILURE";
            }
        }
    }

?>