<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto">
      <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 ">


        <!-- component -->
  <!-- Start of component -->
 
  <!-- End of component -->
   
        @unless ($posts->count()  == 0)
            
      
        @foreach ($posts as $post)

        
        <x-post-card :post="$post" />
        @endforeach

        @else
        <div class="text-center">
            <h1 class="text-3xl  text-center font-bold text-gray-900">No posts found !!!</h1>
        </div>

        @endunless

       
      </div>

      
    </div>
  </section>