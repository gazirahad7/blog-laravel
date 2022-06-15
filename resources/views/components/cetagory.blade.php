<section class="text-gray-600 body-font">
    <div class="container py-5 mx-auto">
      <div class="flex flex-wrap  justify-between text-center ">
        <div class=" mb-4">
          
          <a href="/">  <button class="text-white bg-indigo-500 uppercase  py-2 px-6 font-bold rounded-xl focus:outline-none hover:bg-indigo-600  text-md">All</button></a>
        </div>
        @foreach ($categories as $category)
        <div class="mb-4">
          
          <a href="/?category={{ $category->name }}">  <button class="text-white bg-indigo-500 uppercase  py-2 px-6 font-bold rounded-xl focus:outline-none hover:bg-indigo-600  text-md">{{ $category->name }}</button></a>
        </div>
        
        @endforeach
       
       
      </div>
    </div>
  </section>