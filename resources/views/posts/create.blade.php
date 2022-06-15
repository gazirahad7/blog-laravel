<x-layout>

    @include('components.navbar')


	<div class="container mx-auto flex justify-center">

		<div class="lg:w-1/3 md:w-1/2 bg-white  mt-4   ">
			<h2 class="text-xl font-bold uppercase mb-1">Add New Post</h2>

		<form action="/posts" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="relative mb-4 ">

				<label for="name" class="leading-7 text-md text-gray-600">Upload image</label>
				<input type="file" value="{{ old('image') }}" id="name" name="image" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

			  </div>
			  @error('image')
			  <p class="text-red-500 text-sm">{{ $message }}</p>
			  @enderror
			<div class="relative mb-4 ">

				<label for="name" class="leading-7 text-md text-gray-600">Post title</label>
				<input type="text" value="{{ old('title') }}" id="name" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

			  </div>
			  @error('title')
			  <p class="text-red-500 text-sm">{{ $message }}</p>
			  @enderror

			  <div class="relative mb-4">
				<select required name="category"  id="" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>

			  </div>
			  <div class="relative mb-4">
				<label for="message"  class="leading-7 text-md text-gray-600">Details</label>
				<textarea id="message"  name="details" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('details') }}</textarea>
			  </div>
			  @error('details')
			  <p class="text-red-500 text-sm">{{ $message }}</p>
			  @enderror
			  <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg font-bold">Add</button>
			 
		
		</form>
			</div>
		</div>

	</div>




        
</x-layout>