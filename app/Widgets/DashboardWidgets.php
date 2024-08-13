<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Category;
use App\Models\Content;
use App\Models\Books;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class DashboardWidgets extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        $categories = Category::count();
        $contents = Content::count();
        $books = Books::count();
        $feedbacks = Feedback::count();
        $users = DB::table('users')->count();
        $topUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        $categoriesWithBookCount = Category::withCount('books')->get();

        return view('widgets.dashboardwidgets', [
            'config' => $this->config,
            'users' => $users,
            'books' => $books,
            'feedbacks' => $feedbacks,
            'categories' => $categories,
            'topUsers' => $topUsers,
            'contents' => $contents,
            'categoriesWithBookCount' => $categoriesWithBookCount,
        ]);
    }
}
