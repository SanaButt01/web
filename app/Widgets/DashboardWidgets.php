<?php

namespace App\Widgets;

use App\Model\Category;
use App\Model\Content;
use App\Model\Course;

use App\Model\User;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class dashboardwidgets extends AbstractWidget
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
        $courses = Course::count();
        $contents = Content::count();
        $users = DB::table('users')->count();
      

        return view('widgets.dashboardwidgets', [
            'config' => $this->config,
            'courses' => $courses,
          
            'contents' => $contents,
           
            'users' => $users,
           
            'categories' => $categories,
            

        ]);
    }
}
