<html>
    <head>
        <style type="text/css">
           .div_deg{
            text-align: center;
            width: 400px;
            margin: auto;
          
           }
           .title_deg{
            font-size:30px;
            font-weight: bold;
            color:black;
        
           }
           .div_form{
            display: flex;
            flex-direction: column;
           }
           label{
            font-weight: bold;
            /* margin-top: 10px; */
           }
           
        </style>
      @include('home.homecss')
    </head>
            <body>

              @include('sweetalert::alert')
              <div class="header_section">
                @include('home.header')
              </div>
              <div class="div_deg">
                <h3 class="title_deg mt-4">Add Post</h3>
                <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div  class="div_form">
                        <label for="">Title</label>
                        <input type="text" name="title">                   
                    </div>
                    <div  class="div_form">
                        <label for="">Description</label>
                       <textarea name="description" type="text" cols="30" rows="10"></textarea>                
                    </div>
                    <div  class="div_form">
                        <label for="">Add Image</label>
                        <input type="file" name="image">                   
                    </div>
                    <div>
                        <input type="submit" value="Add Post" class="btn btn-success mt-4">                   
                    </div>
                </form>
              </div>
              @include('home.footer') 
            </body>         
          
     </body>
  </html>
  <script type="text/javascript">
    $(document).ready(function() {
        // Intercept form submission
        $('#postForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the normal way

            // Create a FormData object to hold the form data including the file
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('user_post') }}", // The form action URL
                data: formData,
                contentType: false,  // Prevent jQuery from setting the content type
                processData: false,  // Prevent jQuery from processing the data (for files)
                success: function(response) {
                    // Use SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Post Created!',
                        text: 'Your post has been successfully created.',
                        confirmButtonText: 'OK'
                    });

                    // Optionally clear the form
                    $('#postForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Use SweetAlert for errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! ' + error,
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
