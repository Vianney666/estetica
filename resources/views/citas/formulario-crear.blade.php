@extends('/inicio/app')

@section('titulo', 'crear citas')

@section('contenido')

 <form action="">
<div class="grid md:grid-cols-2 grid-cols-1 gap-x-8">
<div class="relative mb-6">
 <input type="text" id="default-search" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " placeholder="Fecha..." required="">
</div>
<div class="relative mb-6">
 <input type="text" id="default-search" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " placeholder="Hora..." required="">
</div>
</div>
<div class="grid md:grid-cols-2 grid-cols-1 gap-x-8">
<div class="relative mb-6">
 <input type="text" id="default-search" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " placeholder="Cliente id..." required="">
</div>
<div class="relative mb-6">
 <input type="text" id="default-search" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " placeholder="Sucursal id..." required="">
</div>
</div>
<div class="relative mb-6">
<input type="text" id="default-search" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " placeholder="Servicio id..." required="">
</div>
<div class="relative mb-6">
<textarea type="text" id="default-search" class="block w-full h-40 px-5 py-2.5 bg-white leading-7 resize-none text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-2xl placeholder-gray-400 focus:outline-none " placeholder="Your Message..." required=""></textarea>
</div>
<div class="flex items-center justify-center">
<button class="w-52 h-12 bg-indigo-600 hover:bg-indigo-800 transition-all duration-700 rounded-full shadow-xs text-white text-base font-semibold leading-6">Send Message</button>
</div>
</form>

@endsection