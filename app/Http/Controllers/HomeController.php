<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $query = User::query();
        // $query->where('name', '訓志');
        // $users = $query->get();
        // dd($users);
        // $posts = Post::with('user')->get();
        // dd($posts);
        // $data = json_encode($posts);
        // return $data;
        // return view('index', ['posts' => $posts]);
        return view('index');
    }

    public function ajax(Request $request) {

        // $query = Post::with('user');
        $query = Post::query();
        // dd($query->get());

        // 検索
        if($request->filled('search.value')) {

            $search_value = trim(
                mb_convert_kana($request->input('search.value'), 's')
            );
            $keywords = explode(' ', $search_value);

            foreach($keywords as $keyword) {

                $query->where('posts.title', 'LIKE', '%'. $keyword .'%');

            }

        }

        // ソート
        if($request->filled('order.0.column')) {

            $order_column_index = $request->input('order.0.column');
            $order_column = $request->input('columns.'. $order_column_index .'.data');
            $order_direction = $request->input('order.0.dir');
            $query->orderBy($order_column, $order_direction);

        }

        $start = intval($request->start);
        $per_page = intval($request->length);
        $columns = [
            'id',
            'title',
        ];
        $current_page = ($per_page === 0) ? 1 : $start / $per_page + 1;
        return $query->paginate($per_page, $columns, '', $current_page);
        // return $query->get();

    }
}
