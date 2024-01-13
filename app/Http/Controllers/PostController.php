<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//models
use App\Models\Posts;
use App\Models\Image;
//storage
use Storage;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->email == env("ADMIN")){
            return view('post/create');            
        }
        else{
            return redirect('/dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->email == env("ADMIN")){
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:855',
                'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category' => 'required|string|max:355',
            ]);

            $posts = new Posts;
            $posts->title = $request->title;
            $posts->content = $request->content;
            $posts->category = $request->category;
            $posts->save();   

            foreach ($request->file('photos') as $image) { 
                $imageName = time() . '_' . $image->getClientOriginalName();

                $imageModel = new Image;
                $imageModel->photo = 'images/' . $imageName; // Adjust this based on your storage configuration
                $imageModel->post_id = $posts->id;
                $imageModel->save();

                $image->storeAs('images', $imageName, 'public');
            }       

            return redirect('/dashboard');
        }
        else{
            return redirect('/dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Posts::find($id);
        $images = Image::where('post_id',$id)->get();
        return view('post/show',compact('post','images'));
    }
    public function guestShow(string $id)
    {
        $post = Posts::find($id);
        $images = Image::where('post_id',$id)->get();
        return view('post/guestShow',compact('post','images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Posts::find($id);
        if(Auth::user()->email == env("ADMIN")){
            $images = Image::where('post_id',$id)->get();
            return view('post/edit',compact('post','images'));            
        }
        else{
            return redirect('/dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Auth::user()->email == env("ADMIN")){
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:855',
                'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'remove_images.*' => 'required',
                'category' => 'required|string|max:355',
            ]);

            $posts = Posts::find($id);
            $posts->update([
                'title' => $request->title,
                'content' => $request->content,
                'category' => $request->category,
            ]);
            foreach ($request->remove_images as $remove) {
                Storage::disk('public')->delete($remove);
                Image::where('photo',$remove)->delete();
            }
            foreach ($request->file('photos') as $image) { 
                $imageName = time() . '_' . $image->getClientOriginalName();

                $imageModel = new Image;
                $imageModel->photo = 'images/' . $imageName; // Adjust this based on your storage configuration
                $imageModel->post_id = $posts->id;
                $imageModel->save();

                $image->storeAs('images', $imageName, 'public');
            }       

            return redirect('/dashboard');        
        }
        else{
            return redirect('/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Auth::user()->email == env("ADMIN")){
            $posts = Posts::find($id);
            if($posts){
                $posts->delete();
                Image::where('post_id',$posts->id)->delete();
            }else{
                return redirect()->back();
            }
            return redirect('/dashboard');
        }
        else{
            return redirect('/dashboard');            
        }
    }

    public function category()
    {
        return view('post/category');
    }

    public function categoryShow(string $id)
    {
        $posts = Posts::where('category',$id)->get();
        $images = Image::select('post_id', 'photo')
                 ->distinct('post_id')
                 ->get();
        return view('post/categoryShow',compact('posts','images','id'));
    }
    public function guestCategory()
    {
        return view('post/guestCategory');
    }

    public function guestCategoryShow(string $id)
    {
        $posts = Posts::where('category',$id)->get();
        $images = Image::select('post_id', 'photo')
                 ->distinct('post_id')
                 ->get();
        return view('post/guestCategoryShow',compact('posts','images','id'));
    }
    public function img(string $id)
    {
        $image = Image::find($id);
        return view('post/imgShow',compact('image'));
    }
}
