<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Books;
use App\Models\Category;
class AdminController extends Controller
{

    
   
    public function dashboard()
    {
        return view('admin.dashboard');
       
    }
   

     

}
