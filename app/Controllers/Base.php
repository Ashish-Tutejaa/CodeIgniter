<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Base extends Controller
    {
    public function index()
        {
        echo "<h1> Welcome </h1>";
        echo "<a href='/Show'>View Existing Database</a><br>";
        echo "<a href='/Create'>Add Items to Database</a>";
        }
    }

?>