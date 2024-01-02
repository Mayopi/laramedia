<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
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

        return redirect()->route('home');
    }

    private function storeImage ($file): string {
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return "/uploads/" . $fileName;
    }
}
