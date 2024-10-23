<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style type="text/css">
            .post_title{
                font-size:30px;
                font-weight:bold;
                text-align: center;
                padding:15px;
                color:white;
            }
            .div_center{
                text-align: center;
                padding: 7px;
                display: flex;
                flex-direction: column;
              
            }
            .container{
                width: 400px;
            }
            .img_deg img{
             border-radius: 15px;
        }
        </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
       <div class="page-content">
        <h1 class="post_title">Edit Post</h1>
        <div class="container">
            <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
               @method('PUT')
                <div class="div_center">
                    <label for="" class="text-white">Post Title</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="div_center">
                    <label for="" class="text-white">Post Description</label>
                  <textarea name="description" id="" cols="30" rows="10">{{$post->description}}</textarea>
                </div>
              
                <div class="div_center img_deg">
                    <label for="" class="text-white">Old Image</label>
                    <img height="100px" width="100px" src="/postimage/{{$post->image}}" alt="">

                </div>
                <div class="div_center">
                    <label for="" class="text-white">Update old image</label>
                 <input type="file" name="image">
                </div>
                <div class="div_center">
               
                 <input type="submit" class="btn btn-warning">
                </div>
            </form>
        </div>
       </div>
    @include('admin.footer')
     
  </body>
</html>