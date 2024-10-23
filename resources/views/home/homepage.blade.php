  <html>
  <head>
    
    @include('home.homecss')
  </head>
          <body>
            <div class="header_section">
              @include('home.header')
              <!-- banner section start -->
              @include('home.banner')
            </div>
            @include('home.services')
      
         
            @include('home.about')
          
            @include('home.footer') 
          </body>         

</html>