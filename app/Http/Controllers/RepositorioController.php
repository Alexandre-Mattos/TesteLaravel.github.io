<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RepositorioController extends Controller
{
    public function index(Request $request) {
        $getRepos = Http::get("https://api.github.com/users/Alexandre-Mattos/repos");

        $repos = collect(json_decode($getRepos->body()));

        \Illuminate\Support\Facades\Log::channel('single')->debug($repos);


        if( ($request->input('name') != '' || $request->input('name') != null)) {
            $repos = $repos->filter(function ($item) use ($request) {
                // replace stristr with your choice of matching function
                return false !== stristr($item->name, $request->name);
            });
        }

        if($request->has('archived') && ($request->input('archived') != '' || $request->input('archived') != null)){
            $repos = $repos->where('archived', $request->input('archived'));
        }

        if($request->has('orderByAlpha') && ($request->input('orderByAlpha') != '' || $request->input('orderByAlpha') != null)) {
           $repos  =  $repos->sortBy('name');
        }

        if($request->has('orderByDate') && ($request->input('orderByDate') != '' || $request->input('orderByDate') != null) ) {
           $repos =  $repos->sortByDesc('pushed_at');
        }


        return view('searchRepositories', compact('repos'));
    }
}
