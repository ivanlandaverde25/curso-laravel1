<x-layout>

    <x-slot name="title">
        Crear posts
    </x-slot>

    {{-- Actions --}}
    <div class="actions border border-gray-300 px-4 py-4 rounded bg-white">
        <a href="{{route('posts.index')}}" class="bg-teal-400 rounded px-2 py-2 text-white">Regresar al listado</a>
    </div>

    {{-- Errores de validacion --}}
    @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-4" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Error</span>
            <div>
                <span class="font-medium">Debe cumplir con las siguientes validaciones:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- formulario de creacion --}}
    <div class="create mt-5">
        <h1>Creacion de nuevo post</h1>
        
        <form method="POST" action="{{route('posts.store')}}" class="mt-4">
            @csrf

            {{-- Titulo --}}
            <div class="block mt-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{old('title')}}" minlength="2" maxlength="255" required>
                @error('title')
                    <span class="text-red-500 block">{{$message}}</span>
                @enderror
            </div>
                
            {{-- Cuerpo --}}
            <div class="block mt-2">
                <label for="body">body</label>
                <textarea name="body" id="body" cols="50" rows="5" minlength="2" maxlength="255" required>{{old('body')}}</textarea>
                @error('body')
                    <span class="text-red-500 block">{{$message}}</span>
                @enderror
            </div>
            
            {{-- Slug --}}
            <div class="block mt-2">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" value="{{old('slug')}}" minlength="2" maxlength="255" required>
                @error('slug')
                    <span class="text-red-500 block">{{$message}}</span>
                @enderror
            </div>

            {{-- Categoria --}}
            <div class="block mt-2">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    <option value="">Seleccione...</option>
                    @foreach ($categories as $category)
                    <option @selected(old('category_id') == $category->id) value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500 block">{{$message}}</span>
                @enderror
            </div>
                
            {{-- Estado --}}
            <div class="block mt-2">
                <label for="active">
                    <input type="checkbox" name="active" id="active" value="1" @checked(old('active') == 1)>
                    Estado
                </label>
                @error('active')
                    <span class="text-red-500 block">{{$message}}</span>
                @enderror
            </div>

            <div class="block mt-2">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</x-layout>
<script>
    let slug = document.getElementById('slug');
    slug.addEventListener('input', function () {
        this.value = this.value
            .replace(/\s+/g, '-')
            .replace(/[^a-zA-Z0-9-]/g, '');
    });
</script>