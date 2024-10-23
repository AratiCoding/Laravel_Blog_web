<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
   public function post_page(){
      return view('admin.post_page');
   }

   public function add_post(Request $request){
      $user=Auth()->user();
      $userid=$user->id;
      $name=$user->name;
      $usertype=$user->usertype;
       $post=new Post;
       $post->title = $request->title;
       $post->description = $request->description;
       $post->post_status='active';
       $post->user_id=$userid;
       $post->name=$name;
       $post->usertype=$usertype;
       
       $image=$request->image;
        if($image){
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('postimage',$imagename);
         $post->image=$imagename;
        }
       $post->save();
       return redirect()->route('show_post')->with('message','Post Added Successfully');

   }
   public function show_post(){
      $post=Post::all();
      return view('admin.show_post',compact('post'));
   }
  
   public function edit_page($id){
      $post=Post::find($id);
      return view('admin.edit_page',compact('post'));
   }
   public function update_post(Request $request,$id){
  
   $post = Post::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $post->title = $request->input('title');
    $post->description = $request->input('description');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('postimage'), $imageName);
        $post->image = $imageName;
    }

    $post->save();

    return redirect()->route('show_post')->with('success', 'Post updated successfully!');

}

  public function delete_post($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return response()->json(['message' => 'Post deleted successfully!']);
}
public function accept_post($id){
    $data=Post::find($id);
    $data->post_status='active';
    $data->save();
    return redirect()->back()->with('message','Post Status changed to active');
}
public function reject_post($id){
    $data=Post::find($id);
    $data->post_status='rejected';
    $data->save();
    return redirect()->back()->with('message','Post Status changed to Rejected');
}

}