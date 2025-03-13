<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

        $perPage = $request->get('per_page', 10);
        $uploads = UploadFile::query()->paginate($perPage);
        return response()->json($uploads);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'file_name' => 'required|string',
        ]);
        $upload = UploadFile::query()->create($validated);
        return $upload;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $upload = UploadFile::all();
        return $upload;
    }


}
