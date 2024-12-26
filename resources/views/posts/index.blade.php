<x-layout>

    <x-slot name="title">
        Listado de posts
    </x-slot>

    {{-- Actions --}}
    <div class="actions border border-gray-300 px-4 py-4 rounded bg-white">
        <a href="{{route('posts.create')}}" class="bg-teal-400 rounded px-2 py-2 text-white">Registrar nuevo</a>
    </div>

    {{-- Alerta de creacion de registro con exito --}}
    @if (session('create'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-4" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Creacion exitosa</span> El registro se creo exitosamente.
            </div>
        </div>
    @endif

    {{-- Alerta de edicion de registro con exito --}}
    @if (session('edit'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-4" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Edicion exitosa</span> El registro se edito exitosamente.
            </div>
        </div>
    @endif

    {{-- Alerta de edicion de registro con exito --}}
    @if (session('delete'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-4" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Eliminacion exitosa</span> El registro se elimino exitosamente.
            </div>
        </div>
    @endif

    {{-- Listado de posts actuales --}}
    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Body
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de creacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$post->title}}
                        </th>
                        <td class="px-6 py-4">
                            {{$post->body}}
                        </td>
                        <td class="px-6 py-4">
                            {{$post->category->name}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($post->active == 1)
                                Habilitado
                            @else
                                Deshabilitado
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{$post->created_at->format('d/m/Y H:m:s')}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('posts.show', $post)}}" title="Mostrar">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{route('posts.edit', $post)}}" title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginate mt-4">
            {{$posts->links()}}
        </div>
    </div>


</x-layout>