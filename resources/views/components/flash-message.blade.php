@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bottom-5  left-1/2 transform -translate-x-1/2  rounded-xl font-bold text-white bg-indigo-700  px-6 py-2">

    <p>{{ session('message') }}</p>
</div>
@endif

{{-- // for div centered
left-1/2 transform -translate-x-1/2 --}}