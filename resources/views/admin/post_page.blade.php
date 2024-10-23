<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style type="text/css">
            .post_title{
                font-size:30px;
                font-weight:bold;
                text-align: center;
                padding:30px;
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
        </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if(session(  )->has('message'))
        <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
         {{session()->get('message')}}
        </div>
        @endif
        <h1 class="post_title">Add Post</h1>
        <div class="container">
            <form action="{{route('add_post')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="div_center">
                    <label for="" class="text-white">Post Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div_center">
                    <label for="" class="text-white">Post Description</label>
                  <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="div_center">
                    <label for="" class="text-white">Add image</label>
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