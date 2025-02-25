<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;



class SingerController extends Controller
{
    public function index()
    {
        return response()->json(Singer::all());
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $singer = Singer::create($validated);
            
            return response()->json($singer, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
