<?php
namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function index()
    {
        $singers = Singer::all();
        return view('singers.index', compact('singers'));
    }

    public function create()
    {
        return view('singers.create');
    }

    public function store(Request $request)
    {
        $singer = Singer::create($request->all());
        return redirect()->route('singers.index');
    }

    public function edit($id)
    {
        $singer = Singer::find($id);
        return view('singers.edit', compact('singer'));
    }

    public function update(Request $request, $id)
    {
        $singer = Singer::find($id);
        $singer->update($request->all());
        return redirect()->route('singers.index');
    }

    public function destroy($id)
    {
        Singer::destroy($id);
        return redirect()->route('singers.index');
    }
}