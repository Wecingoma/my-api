<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        $posts = Post::with('author')->latest()->get();
        return Inertia::render('Welcome', [
            'post' => $posts,
            'canRegister' => config('services.registration.enable', true)
        ]);
    }
}
