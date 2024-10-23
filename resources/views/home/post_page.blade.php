<html>
    <head>
        <base href="/public">
      @include('home.homecss')

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
            margin-top: 10px;
           }
           
        </style>
    </head>
            <body>

              @include('sweetalert::alert')
              <div class="header_section">
                @include('home.header')
            
              </div>
              <div class="div_deg">
                <h3 class="title_deg mt-4">Edit Post</h3>
                <form action="{{url('update_post_data',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div  class="div_form">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{$data->title}}">                   
                    </div>
                    <div  class="div_form">
                        <label for="">Description</label>
                       <textarea name="description" type="text" cols="30" rows="10">{{$data->description}}</textarea>                
                    </div>
                    <div  class="div_form">
                        <label for="">Current Image</label>
                         <img name="image" height="150" width="400" src="/postimage/{{$data->image}}" alt="">                   
                    </div>
                    <div  class="div_form">
                        <label for="">Change Image</label>
                        <input type="file" name="image" id="">                 
                    </div>
                    <div>
                        
                        <input type="submit"  class="btn btn-success mt-4">                   
                    </div>
                </form>
              </div>
         
            
              @include('home.footer') 
            </body>         
          
     </body>
  </html>