@extends('/inicio/app')

@section('titulo', 'crear administradores')

@section('contenido')

    <section class="bg-white dark:bg-gray-900 mt-10">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Registrar administrador</h2>
            <form action="/admins/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre(s)</label>
                        <input type="text" name="nombre" id="nombre" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nombre(s)" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido(s)</label>
                        <input type="text" name="apellidos" id="apellidos" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Apellido(s)" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                            electrónico</label>
                        <input type="email" name="correo" id="correo" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ejemplo@ejemplo.com" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Contraseña" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                            contraseña</label>
                        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Confirmar contraseña" required="">
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                        <select id="rol" name="rol" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Seleccionar</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Empleado">Empleado</option>
                        </select>
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                        <select id="estado" name="estado" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Seleccionar</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
 
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Subir archivos
                        </label>

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:bg-gray-700 dark:hover:bg-gray-800">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click para subir</span> o arrastra imagen
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        PNG, JPG (Max. 10MB)
                                    </p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" multiple />
                            </label>
                        </div>


                        <div id="file-list" class="mt-4 space-y-2 hidden">

                        </div>
                </div>

                <script>
                    document.getElementById('dropzone-file').addEventListener('change', function(e) {
                        const fileList = document.getElementById('file-list');
                        fileList.innerHTML = '';
                        fileList.classList.remove('hidden');

                        Array.from(e.target.files).forEach((file, index) => {
                            const fileElement = document.createElement('div');
                            fileElement.className =
                                'flex items-center justify-between p-3 bg-gray-100 dark:bg-gray-800 rounded-lg';
                            fileElement.innerHTML =
                                `
                            <div class="flex items-center space-x-3">
                             <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                              </svg>
                                 <span class="text-sm text-gray-700 dark:text-gray-300 truncate">${file.name}</span>
                            </div>
                             <span class="text-xs text-gray-500 dark:text-gray-400">${(file.size / 1024 / 1024).toFixed(2)} MB</span>`;
                            fileList.appendChild(fileElement);
                        });
                    });
                </script>
        </div>
        <button type="submit"
            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-purple-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Guardar
        </button>
        </form>
        </div>
    </section>

@endsection
