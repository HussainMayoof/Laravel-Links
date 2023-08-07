<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;


class LinkController extends Controller
{
    public function index() {
        $links = auth()->user()->links()->withCount('visits')->with('latest_visit')->get();

        return view('links.index', ['links'=>$links]);
    }

    public function create() {
        return view('links.create');
    }

    public function store(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link = auth()->user()->links()->create([
            'name' => strip_tags($incomingFields['name']),
            'link' => strip_tags($incomingFields['link'])
        ]);

        $link->save();

        return redirect('/dashboard/links');
    }

    public function edit(Link $link) {
        if ($link->user_id != auth()->user()->id){
            return abort(403);
        }
        return view('links.edit', ['id'=>$link->id, 'name'=>$link->name, 'link'=>$link->link]);
    }

    public function update(Request $request, Link $link) {
        if ($link->user_id != auth()->user()->id){
            return abort(403);
        }

        $incomingFields = $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url',
        ]);

        $newLink = auth()->user()->links()->where('id', $link->id)->update([
            'name'=>$incomingFields['name'],
            'link'=>$incomingFields['link'],
        ]);

        return redirect('/dashboard/links');
    }

    public function destroy(Request $request, Link $link) {
        if ($link->user_id != auth()->user()->id){
            return abort(403);
        }

        $link->delete();

        return redirect('/dashboard/links');
    }
}
