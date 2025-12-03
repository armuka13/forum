@props(['id'])
<div class="flex items-center rounded-md bg-white/50 pl-3 outline-1 -outline-offset-1 outline-  /10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
    <input {{ $attributes->merge(['class'=>'block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black border border-black outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" ']) }} />
</div>