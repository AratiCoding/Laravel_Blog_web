<html>
    <head>
      
      @include('home.homecss')
      <style type="text/css">
          .post_deg{
            padding: 30px;
            text-align: center;
          }
          .title_deg{
            font-size: 30px;   
            font-weight: bold;
            padding: 15px; 
          }
          .des_deg{
            font-size: 18px;   
            font-weight: bold;
            padding: 15px; 
          }
          .img_deg{
            height: 400px;
            width: 500px;
            margin: auto;
          
          }
      </style>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- SweetAlert CDN -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
            <body>
              <div class="header_section mb-4">
                @include('home.header')
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif
              </div>

         
            @foreach($data as $data)
             <div class="post_deg">
                <img class="img_deg" src="/postimage/{{$data->image}}" alt="">
                <h1 class="title_deg">{{$data->title}}</h1>
                <p class="des_deg">{{$data->description}}</p>
                <a onclick="return confirm('are sure to delete this?')" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{url('post_update_page',$data->id)}}" class="btn btn-warning">Update</a>
             </div>
          @endforeach
              @include('home.footer') 
              <script type="text/javascript">
                $(document).ready(function() {
                  // Handle click event for delete button
                  $('.delete-post').on('click', function(e) {
                    e.preventDefault(); // Prevent default action
                    var postId = $(this).data('id'); // Get the post ID
            
                    // SweetAlert confirmation dialog
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        // If confirmed, make the AJAX request to delete the post
                        $.ajax({
                          type: 'DELETE', // HTTP method to delete
                          url: "{{ url('my_post_del') }}/" + postId, // URL to send the request to
                          data: {
                            _token: "{{ csrf_token() }}" // CSRF token for security
                          },
                          success: function(response) {
                            if (response.success) {
                              // Remove the post from the page
                              $('#post-' + postId).remove();
                              
                              // SweetAlert success notification
                              Swal.fire(
                                'Deleted!',
                                'Your post has been deleted.',
                                'success'
                              );
                            } else {
                              // SweetAlert error notification if deletion fails
                              Swal.fire(
                                'Error!',
                                'Failed to delete the post. Please try again.',
                                'error'
                              );
                            }
                          },
                          error: function(xhr, status, error) {
                            // SweetAlert error notification if an error occurs
                            Swal.fire(
                              'Error!',
                              'An error occurred. Please try again.',
                              'error'
                            );
                          }
                        });
                      }
                    });
                  });
                });
              </script>
            </body>
            </html>
            </body>         
          
      
  </html>