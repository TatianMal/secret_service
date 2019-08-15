<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class DataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create_data()
    {

    }

    public function show($id)
    {
        $data = Data::findOrFail($id);
        return view('data', compact($data));
    }

    public function get_data($id)
    {
        $data = Data::findOrFail($id);
    }

    public function delete($id)
    {
        Data::findOrFail($id)->delete();
        return redirect('/');
    }
}
