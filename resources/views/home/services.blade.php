<head>
   <base href="/public">
   @include('home.homecss')
   <style>
      .services_img{
        height: 200px; 
        width: 300px; /* Maintain aspect ratio */
        object-fit: cover;
        margin-top: 20px;
        border-radius: 20px;
      }
      .col-md-4{
        display: flex;
        flex-direction: column;
      }
      .para{
         margin-bottom: -15px;
         margin-top: -15px;
      }
      .btn_main{
         margin-bottom: 10px;
      } 
   </style>
</head>
<body>


<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Blog Posts</h1>
       <p class="services_text">Explore captivating tales of adventure, travel tips, and firsthand experiences from explorers around the world. Each story is crafted to inspire your next unforgettable journey.</p>
       <div class="services_section_2">
          <div class="row">
            @foreach($post as $post)
             <div style="text-align:center;" class="col-md-4">
                <div ><img src="/postimage/{{$post->image}}" class="services_img"></div>
                <h2>{{$post->title}}</h2>
               <div><p class="para">Post By <b>{{$post->name}}</b></p></div>
                <div class="btn_main"><a href="{{url('post_details',$post->id)}}">Read More</a></div>
             </div>
             @endforeach
          
          </div>
       </div>
    </div>
 </div>
 
</body>