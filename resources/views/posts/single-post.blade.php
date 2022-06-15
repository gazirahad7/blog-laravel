
<x-layout>

{{--  
<section>
  <div class="container mx-auto">
      <div class="mt-4">
        <button class="bg-indigo-500 py-2 px-4 rounded-xl text-white font-bold " onclick="history.back()">Back</button>

      </div>
    <div class="flex flex-col items-center justify-center text-center h-screen">

      
            <img alt="mountain" class="  rounded-md border-2 border-gray-300" height="200px" width="200px" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/seed/picsum/200' }}"  />
     


        <div class="mt-3">
          <p>Post Category: {{ $post->category }}</p>
          <h4>Post Title: {{ $post->title }}</h4>

          <h2 >Post Details</h2>
          <p> {{ $post->details }}</p>

        
        </div>
      </div>
      

  </div>
</section> --}}




<!-- component -->
<div class="max-w-screen-xl mx-auto">

 
  <main class="mt-10">
    <button class="bg-indigo-500 py-2 px-4 rounded-xl text-white font-bold " onclick="history.back()">Back</button>

    <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
      <div class="absolute left-0 bottom-0 w-full h-full z-10"
        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
      <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/seed/picsum/200' }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
      <div class="p-4 absolute bottom-0 left-0 z-20">
        <a href="#"
          class="px-4 py-1 rounded-md bg-indigo-700 text-gray-200 inline-flex items-center justify-center mb-2">{{ $post->category }}</a>
        <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
          {{ $post->title }}
        </h2>
        <div class="flex mt-3">
         
            <button alt="avatar" class="h-10 w-10 rounded-full mr-2 text-white border-2 border-indigo-300 font-bold" >{{ $post->user->name[0] }}</button>
          <div>
           
            <p class="font-semibold text-gray-200 text-sm">{{ $post->user->name }}</p>
            <p class="font-semibold text-gray-400 text-xs">{{ $post->created_at->format('d M ') }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
    

     
      <div class="flex items-center mb-2">
          @if(!$post->isLikedByUser(Auth::user()))

        <form action="/posts/{{ $post->id }}/likes" method="POST" class="mr-2">
          @csrf
          <button type="submit" class="text-blue-500 ">Like</button>
        </form>
        @else
        <form action="/posts/{{ $post->id }}/likes" method="POST" class="mr-2">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-blue-500 p ">Dislike</button>
        </form>
        @endif
        <span>{{ $post->likes->count() }}  {{ Str::plural('like', $post->likes->count()) }}</span>
      </div>

      <div class="border-l-4 border-gray-500 pl-4 mb-6  rounded">
        {{ $post->details }}
      </div>





    </div>
  </main>
  <!-- main ends here -->

  
</div>


</x-layout>

