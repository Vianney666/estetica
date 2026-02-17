@extends('/inicio/app')

@section('titulo', 'Iniciar Sesión')

@section('contenido')

    <div class="pt-28 min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl w-full p-6">

            <!-- Login Card -->
            <div class="bg-slate-800 rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-white mb-2">Bienvenido</h2>
                {{-- <p class="text-slate-400 mb-6">
                    ¿No tienes una cuenta?
                    <a href="/registro" class="text-blue-500 hover:underline">Regístrate.</a>
                </p> --}}

                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="space-y-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label class="block mb-1 text-sm text-white">Correo</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full rounded-lg bg-slate-700 border border-slate-600 text-white p-2.5">
                    </div>

                    <div>
                        <label class="block mb-1 text-sm text-white">Contraseña</label>
                        <input type="password" name="password" required
                            class="w-full rounded-lg bg-slate-700 border border-slate-600 text-white p-2.5">
                    </div>

                    <div class="flex items-center my-4">
                        <hr class="flex-grow border-slate-600">
                        <span class="px-3 text-slate-400 text-sm">o</span>
                        <hr class="flex-grow border-slate-600">
                    </div>

                    {{-- <a href="{{ route('auth.redirect') }}"
                        class="w-full flex items-center justify-center gap-2 border border-slate-600 text-white rounded-lg py-2 hover:bg-slate-700">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook" class="w-5 h-5">
                        Inicia sesión con Facebook
                    </a> --}}

                    <a href="{{ url('/auth/google') }}"
                        class="w-full flex items-center justify-center gap-2 border border-slate-600 text-white rounded-lg py-2 hover:bg-slate-700">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                        Inicia sesión con Google
                    </a>

                    <button type="submit"
                        class="w-full bg-[#FFAFCC] hover:bg-[#A2D2FF] text-[#1A202C] mt-6 font-medium rounded-lg py-2.5">
                        Iniciar sesión
                    </button>
                </form>
            </div>


            <div class="hidden md:flex items-center justify-center">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/illustration.svg"
                    class="max-w-md">
            </div>

        </div>
    </div>
@endsection
