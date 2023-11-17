<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();

		if (!empty($news)) {
			$response = [
				'message' => 'Get All Resource', 
				'data' => 'menampilkan seluruh resource', $news,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data is empty'
			];
			return response()->json($response, 200);
		}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $news = News::create($request->all());

		$response = [
			'message' => 'Resource is added successfully',
			'data' => 'menampikan resource yang berhasil ditambahkan', $news,
		];

		return response()->json($response, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #validate
        $validateData = $request->validate([
            'title' => 'required',
            'author' => 'author|required',
            'description' => 'description|required',
            'content' => 'content|required',
            'url' => 'url|required',
            'url_image' => 'url_image|required',
            'published_at' => 'published_at|required',
            'category' => 'required'
        ]);

        $news = News::create($validateData);


        $data = [
            'message' => 'News is created succesfully',
            'data' => $news,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find();

		if (!empty($news)) {
        $response = [
			'message' => 'Get Detail resource',
			'data' => 'menampikan single resource', $news,
		];

		return response()->json($response, 200);
        } else {
        $response = [
            'message' => 'Data is empty'
        ];
        return response()->json($response, 404);
        }  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::find($id);

        if (!empty($news)) {
            $response = [
                'message' => 'Resource is update successfully',
                'data' => 'menampikan single resource yang di-update', $news,
            ];
    
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Resource not found'
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);

        if (!empty($news)) {
            $response = [
                'message' => 'Resource is delete successfully',
                'data' => $news,
            ];
    
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Resource not found'
            ];
            return response()->json($response, 404);
        }
    }
    public function title(string $id)
    {
        $news = News::where('title')->get();
        
        if (!empty($news)) {
            $response = [
                'message' => 'Get searched resource',
                'data' => 'menampilkan semua resource yang berhasil dicari', $news,
            ];
    
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Resource not found'
            ];
            return response()->json($response, 404);
        }
    }
    public function sport(string $id)
    {
        $news = News::where('sport')->get();
        
        if (!empty($news)) {
            $response = [
                'message' => 'Get sport resource',
                'total' => 'menampilkan total resource sport',
                'data' => 'menampilkan semua resource sport', $news,
            ];
    
            return response()->json($response, 200);
        }
    }
    public function finance(string $id)
    {
        $news = News::where('finance')->get();
        
        if (!empty($news)) {
            $response = [
                'message' => 'Get finance resource',
                'total' => 'menampilkan total resource finance',
                'data' => 'menampilkan semua resource finance', $news,
            ];
    
            return response()->json($response, 200);
        }
    }
    public function automotive(string $id)
    {
        $news = News::where('automotive')->get();
        
        if (!empty($news)) {
            $response = [
                'message' => 'Get automotive resource',
                'total' => 'menampilkan total resource automotive',
                'data' => 'menampilkan semua resource automotive', $news,
            ];
    
            return response()->json($response, 200);
        }
    }
}
