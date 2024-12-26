<x-layout>

    <x-slot name="title">
        Mostrar posts
    </x-slot>

    {{-- Actions --}}
    <div class="actions border border-gray-300 px-4 py-4 rounded bg-white">
        <a href="{{route('posts.index')}}" class="bg-teal-400 rounded px-2 py-2 text-white">Regresar al listado</a>
        <a href="{{route('posts.create')}}" class="bg-teal-400 rounded px-2 py-2 text-white">Registrar nuevo</a>
        <form action="{{route('posts.destroy', $post)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-400 rounded px-2 py-2 text-white" type="submit">Eliminar post</button>
        </form>
    </div>

    {{-- Detalles del post seleccionado --}}
    <div class="detalles mt-4 p-3 bg-white rounded">
        <ul>
            <li>
                <b>Titulo: </b> {{ $post->title}}
            </li>
            <li>
                <b>Contenido: </b> {{ $post->body}}
            </li>
            <li>
                <b>Categoria: </b> {{ $post->category->name}}
            </li>
            <li>
                <b>Mostrar: </b> 
                @if ($post->active == 1)
                    Habilitado
                @else
                    Deshabilitado
                @endif
            </li>
            <li>
                <b>Fecha de creacion: </b> {{ $post->created_at->format('d/m/Y H:m:s')}}
            </li>
        </ul>
    </div>
</x-layout>