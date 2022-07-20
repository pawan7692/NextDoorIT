<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "post_title" => "required|unique:posts,title",
            "post_category" => "required",
            "post_tags" => "required",
            "post_description" => "required"
        ]);

        if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        else {

            try {

                $post = new Post;
                
                $post->title = $request->post_title;
                $post->slug = Str::slug($request->post_title); 
                $post->category_id = $request->post_category; 
                $post->description = $request->post_description;             
                $post->status = $request->category_status?1:0;

                if($file= $request->file('post_banner')) {

                    $fileOriginalName = $file->getClientOriginalName();
                    $fileName = pathInfo($fileOriginalName, PATHINFO_FILENAME);
                    $fileExtension = pathInfo($fileOriginalName, PATHINFO_EXTENSION);

                    $folderToUpload = '/admin/uploads/post';

                    $destinationPath = public_path().$folderToUpload;
                    $safeName = $fileName.'_'.time().'_'.$fileExtension;
                    $file->move($destinationPath, $safeName);

                    $post->banner = $safeName;

                }
                $post->save();

                $post->tags()->attach($request->post_tags);
                
                $response = array(
                    'status' => true,
                    'message' => 'Post Added Successfully',
                    'redirect' => route('admin.posts.index')
                );
               

            } catch(\Exception $e) {
                Log::error($e->getMessage());

                $response = array(
                    'status' => false,
                    'message' => 'Error Occurred'
                );
            }
        }


        return Response::json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $post = Post::find($id);
            $post->delete($id);

            Log::info("Post with Id ". $id." Delete Successfully");

            $response = array(
                'status' => true,
                'message' => 'Post Deleted Successfully',
                'redirect' => route('admin.categories.index')
            );

        } catch (\Exception $e) {
           Log::error($e->getMessage());

            $response = array(
                'status' => false,
                'message' => 'Error Occurred'
            );

       }

       return Response::json($response);
    }
}
