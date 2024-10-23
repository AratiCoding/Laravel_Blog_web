
<head>
    <base href="/public">
    @include('home.homecss')
    <style>
      .img_deg{
        height: 400px;
        width: 500px;
        margin: auto;
      }
    </style>
</head>
                   
<div class="header_section">
  @include('home.header')
</div>

<div style="text-align:center;" class="col-md-12">
    <div ><img class="img_deg" src="/postimage/{{$post->image}}" class="services_img"></div>
    <h2 style="font-size:2rem;"><b>{{$post->title  }}</b></h2>
    <p style="font-size:1rem; color:black;">{{$post->description}}</p>
   <div><p class="para" style="font-weight:bold;">Post By {{$post->name}}</p></div>
  
 </div>
@include('home.footer')    
{{-- </body> --}}
{{-- </html> --}}