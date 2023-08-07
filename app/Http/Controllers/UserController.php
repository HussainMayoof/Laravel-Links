<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user) {
        return view('users.show', ['user'=>$user, 'links'=>$user->links, 'text'=>$user->text_colour, 'background'=>$user->background_colour]);
    }

    public function edit() {
        return view('users.edit', ['user'=>auth()->user()]);
    }

    public function update(Request $request) {
        $incomingFields = $request->validate([
            'background' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'text' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ]);

        $user = auth()->user();

        $user->background_colour = $incomingFields['background'];
        $user->text_colour = $incomingFields['text'];

        $user->save();

        return redirect('/dashboard/links')->with('success',"Your page's colours were changed");
    }
}
