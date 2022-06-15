@props(['post'])
    
  {{-- @php
      var_dump($posts);
  @endphp --}}
 {{-- <a href="/posts/{{ $post->id }}">
<div class="py-3 px-4 lg:w-1/3">
    <div class="h-full flex items-start p-3 rounded border-2 border-dashed border-gray-300">
      <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none  ">
        <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ $post->created_at->format('M') }}</span>
        <span class="font-medium text-lg text-gray-800 title-font leading-none">{{ $post->created_at->format('d') }}</span>
      </div>
      <div class="flex-grow pl-6">
        <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">CATEGORY: {{ $post->category }}</h2>
        <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ $post->title }}</h1>
        <p class="leading-relaxed mb-5">{{ $post->details }}</p>
        <a class="inline-flex items-center">
          <img alt="blog" src="https://dummyimage.com/101x101" class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
          <span class="flex-grow flex flex-col pl-3">
            <span class="title-font font-medium text-gray-900">Henry Letham</span>
          </span>
        </a>
      </div>
    </div>
  </div>


</a>  --}}

<div class=" bg-white border-2 border-indigo-300 p-4 rounded-md tracking-wide   shadow-lg">
  <div  class="flex"> 
     <img alt="mountain" class=" w-48  rounded-md border-2 border-gray-300"  src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/seed/picsum/200' }}"  />
     <div  class="flex flex-col ml-5">
      <div class="mt-2">
         <h2 class="tracking-widest text-md title-font font-medium text-indigo-500 mb-1">Category: <span class="uppercase text-black">{{ $post->category }}</span></h2>

      </div>
      <a href="/posts/{{ $post->id }}">
        <h4  class="text-lg font-semibold mb-2 hover:underline"><span class="font-bold">Title:</span> {{ Str::limit( $post->title, 25) }}</h4></a> 
        <a href="/posts/{{ $post->id }}">

        <p  class="text-gray-800 mt-2 hover:underline"> <b>Details:</b> {{ Str::limit( $post->details, 30) }}</p>

      </a> 

        <div class="flex  mt-5">
           
            <button alt="avatar" class="w-7 h-7 rounded-full border-2 border-indigo-300 font-bold" >{{ $post->user->name[0] }}</button>
            <p class="ml-3 font-semibold">{{ $post->user->name }}</p>
            <p class=" ml-8 font-semibold text-black">{{ $post->created_at->format('d M Y') }}</p>
        </div>
     </div>
  </div>

  <div class="flex  mt-2">
    @if(!$post->isLikedByUser(Auth::user()))

    <form action="/posts/{{ $post->id }}/likes" method="POST" class="mr-2">
      @csrf
      <button type="submit" class="text-blue-500 ">Like</button>
    </form>
    @else
    <form action="/posts/{{ $post->id }}/likes" method="POST" class="mr-2">
      @csrf
      @method('DELETE')
      <button type="submit" class="text-blue-500 ">Dislike</button>
    </form>
    @endif
    <span>{{ $post->likes->count() }}  {{ Str::plural('like', $post->likes->count()) }}</span>
</div>

</div>

