<x-layout>

    @include('components.navbar')

    {{-- <x-card class="p-10">
      <header>
          <a href="/posts/create"><button>Add New Post</button></a>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage Posts
        </h1>
      </header>
  
      <table class="w-full table-auto rounded-sm">
        <tbody>
          @unless($posts->isEmpty())
          @foreach($posts as $post)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/posts/{{ $post->id}}"> {{$post->title}} </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/posts/{{$post->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                  class="fa-solid fa-pen-to-square"></i>
                Edit</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <form method="POST" action="/posts/{{$post->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          @else
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <p class="text-center">No posts Found</p>
            </td>
          </tr>
          @endunless
  
        </tbody>
      </table>
    </x-card> --}}





    <!-- component -->
<div class="">

    <a href="/posts/create"><button class="bg-indigo-500 py-2 px-4 rounded-xl text-white font-bold m-8">Add Post</button>
    </a>
    <h4 class=" font-bold text-center text-2xl p-3">Manage your Posts :)</h4>
    {{-- {{ $users->receivedLikes->count() }} --}}
    <h5 class=" font-bold text-center text-md p-3">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received    likes</h5>
    <div class="min-w-screen   flex items-center justify-center  ">
        <div class="w-full lg:w-5/6">
            <div class="shadow-md rounded my-6">

                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Date</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-center">Likes</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-bold ">
                        @unless($posts->isEmpty())
                        @foreach($posts as $post)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-6">{{ $post->title }}</td>
                         
                        
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $post->likes->count() }}  {{ Str::plural('like', $post->likes->count()) }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                       <a href="/posts/{{ $post->id}}">
                                        <button class="py-1 px-2 text-white font-bold text-xs bg-green-300 rounded-full">View</button>

                                       </a>
                                   
                                        <a href="/posts/{{ $post->id}}/edit">
                                            <button class="py-1 px-2 text-white font-bold text-xs bg-yellow-300 rounded-full">Edit</button>

                                        </a>
                                                               
                                        <form method="POST" action="/posts/{{$post->id}}" class="inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="py-1 px-2 text-white font-bold text-xs bg-red-500 rounded-full">Delete</button>
                                            
                                          </form>
                                         
                            </td>
                        </tr>
                      
                        
                      
                        @endforeach
                        @else
                        <tr class="border-gray-300">
                          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No posts Found</p>
                          </td>
                        </tr>
                        @endunless
                       
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  </x-layout>