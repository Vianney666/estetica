@extends('/inicio/app')

@section('titulp', 'Iniciar Sesión')

@section('contenido')

    <div class="pt-28 min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl w-full p-6">

            <!-- Login Card -->
            <div class="bg-slate-800 rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-white mb-2">Bienvenido</h2>
                <p class="text-slate-400 mb-6">
                    ¿No tienes una cuenta?
                    <a href="#" class="text-blue-500 hover:underline">Regístrate.</a>
                </p>

                <form class="space-y-4">
                    <div>
                        <label class="block mb-1 text-sm text-white">Correo</label>
                        <input type="email"
                            class="w-full rounded-lg bg-slate-700 border border-slate-600 text-white p-2.5">
                    </div>

                    <div>
                        <label class="block mb-1 text-sm text-white">Contraseña</label>
                        <input type="password"
                            class="w-full rounded-lg bg-slate-700 border border-slate-600 text-white p-2.5">
                    </div>

                    <div class="flex items-center my-4">
                        <hr class="flex-grow border-slate-600">
                        <span class="px-3 text-slate-400 text-sm">ó</span>
                        <hr class="flex-grow border-slate-600">
                    </div>

                    <button type="button"
                        class="w-full flex items-center justify-center gap-2 border border-slate-600 text-white rounded-lg py-2 hover:bg-slate-700">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Feis" class="w-5 h-5">
                        Inicia sesión con Facebook
                    </button>

                    

                    <div class="flex justify-between items-center text-sm">
                        <label class="flex items-center gap-2 text-slate-400">
                            <input type="checkbox" class="rounded">
                            Recuérdame
                        </label>
                        <a href="#" class="text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#FFAFCC] hover:bg-[#A2D2FF] text-[#1A202C] font-medium rounded-lg py-2.5">
                        Iniciar sesión
                    </button>
                </form>
            </div>

            <!-- Imagen (opcional) -->
            <div class="hidden md:flex items-center justify-center">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/illustration.svg"
                    class="max-w-md">
            </div>

        </div>
    </div>
@endsection
