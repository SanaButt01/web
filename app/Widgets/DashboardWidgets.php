<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Category;
use App\Models\Content;
use App\Models\Books;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB; // Add this line to import the DB facade
class DashboardWidgets extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $categories = Category::count();
        
        $contents = Content::count();
$books=Books::count();
$feedbacks=Feedback::count();
  $users = DB::table('users')->count();
  $topUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        return view('widgets.dashboardwidgets', [
            'config' => $this->config,
              'users' => $users,
              'books'=>$books,
              'feedbacks'=>$feedbacks,
            'categories' => $categories,
            'topUsers' => $topUsers,
            'contents' => $contents,
        ]);
        //
 // Your widget logic here
//  $categories = Category::count();

//  $contents = Content::count();

 
//  return view('widgets.dashboardwidgets', [
//      'config' => $this->config,
    
//      'contents' => $contents,
     
//    
 
//      'categories' => $categories,
     

//  ]);
}


}