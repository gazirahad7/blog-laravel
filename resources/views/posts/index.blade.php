<x-layout>

    @include('components.navbar')
    @include('partials._banner')
    @include('components.search')
   @include('components.cetagory')

    @include('partials._posts')


    
    <div class="mt-6 p-4">
        {{ $posts->links() }}
    </div>

</x-layout>