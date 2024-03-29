<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index () {
        $user = User::find(Auth::id());

        return view('post.index', [
            'user' => $user,
            'posts' => $user->posts()->get()
        ]);
    }

    public function view (string $id) {
        $post = Post::find($id);

        return view('post.update', [
            'post' => $post
        ]);
    }

    public function create () {
        return view('post.create');
    }

    public function store (Request $request) {
        $request->validate([
            'name' => ['required'],
            'caption' => ['required'],
            'image' => ['required', 'mimes:png,jpeg,jpg,webp']
        ]);

        $imagePath = $this->storeImage($request->file('image'));

        Post::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'caption' => $request->caption,
            'image' => $imagePath
        ]);

        return redirect()->route('post.index');
    }

    public function update (Request $request, string $id) {
        $request->validate([
            'name' => ['required'],
            'caption' => ['required'],
        ]);
        
        $post = Post::find($id);

        $post->name = $request->name;
        $post->caption = $request->caption;
        $post->image = $request->file('image') ? $this->storeImage($request->file('image')) : $post->image;

        $post->save();

        return redirect()->route('post.index');
    }

    public function delete (string $id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route("post.index");
    }

    private function storeImage ($file): string {
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return "/uploads/" . $fileName;
    }
}
