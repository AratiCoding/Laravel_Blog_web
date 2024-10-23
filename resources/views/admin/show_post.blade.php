<!DOCTYPE html>
<html>
  <head> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @include('admin.css')
     <style type="text/css">
        .title_deg{
          font-size:30px;
          font-weight: bold;
          color:white;
          padding:30px;
          text-align:center;
        }
        .table_deg{
            border:1px solid white;
            width:80%;
            text-align:center;
            margin-left: 100px;
        }
        .th_deg{
            background-color: azure;
            color:black;
        }
        .img_deg{
            width: 100px;
            height: 100px;
            padding: 10px;
            border-radius: 20px;
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
        @if(session()->has('message'))
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
            {{session()->get('message')}}
          </div>
        @endif
        <h1 class="title_deg">ALL POST</h1>
        <table class="table_deg">
            <tr class="th_deg">
                <th>Post Title</th>
                {{-- <th>Description</th> --}}
                <th>Post By</th>
                <th>Post Status</th>
                <th>Usertype</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Status Accept</th>
                <th>Status Reject</th>
            </tr>
            @foreach($post as $post)
            <tr id="post-row-{{$post->id}}">
                <td>{{$post->title}}</td>
                {{-- <td>{{$post->description}}</td> --}}
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->usertype}}</td>
                <td>
                    <img class="img_deg" src="postimage/{{$post->image}}" alt="">
                </td>
             
                <td>
                  <button class="btn btn-danger" onclick="deletePost({{$post->id}})">Delete</button>
              </td>
             
              
                <td>
                  <a href="{{url('edit_page',$post->id)}}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <a href="{{url('accept_post',$post->id)}}" class="btn btn-success">Accept</a>
                </td>
                <td>
                    <a onclick="return confirm('are sure to reject this post?')" href="{{url('reject_post',$post->id)}}" class="btn btn-outline-success">Reject</a>
                </td>
                
            </tr>
            @endforeach
      
        </table>
      </div>
    @include('admin.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script type="text/javascript">
     function deletePost(postId) {
    swal({
        title: "Are you sure you want to delete this?",
        text: "You won't be able to revert this delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: '/delete_post/' + postId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}", // include CSRF token
                },
                success: function(response) {
                    swal("Post has been deleted successfully!", {
                        icon: "success",
                    }).then(() => {
                        // Remove the deleted row from the table without reloading the page
                        $('#post-row-' + postId).remove();
                    });
                },
                error: function(xhr) {
                    swal("Error deleting post!", {
                        icon: "error",
                    });
                }
            });
        }
    });
}

    </script>
   
  </body>
</html>