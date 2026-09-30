<x-layout :meta-title="$post->title" :meta-description="$post->body">
  <article class="mx-auto mt-12 mb-16 max-w-3xl rounded-md bg-white p-8 shadow dark:bg-slate-800">

    <h1 class="font-serif text-4xl font-bold text-sky-600 dark:text-sky-400">{{ $post->title }}</h1>

    {{-- Autor y fecha --}}
    <div class="mt-4 flex items-center gap-3">
      <span class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-200 text-slate-700 dark:bg-slate-700 dark:text-slate-100">
        JG
      </span>
      <div class="text-sm">
        <p class="font-semibold text-slate-700 dark:text-slate-200">Jorge García</p>
        <p class="text-slate-500 dark:text-slate-400">{{ $post->created_at?->format('M j, Y') }}</p>
      </div>
    </div>

    {{-- Contenido completo; whitespace-pre-line respeta los saltos de línea que escribiste --}}
    <p class="mt-8 leading-relaxed whitespace-pre-line text-slate-700 dark:text-slate-300">{{ $post->body ?: 'Sin contenido.' }}</p>

    {{-- Acciones --}}
    <div class="mt-10 flex items-center justify-between border-t border-slate-200 pt-6 dark:border-slate-700">
      <a href="{{ route('posts.index') }}" class="text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200">
        ← Volver al blog
      </a>

      {{-- Editar y Eliminar: solo con sesión iniciada --}}
      @auth
      <div class="flex items-center gap-3">
        <a href="{{ route('posts.edit', $post) }}"
          class="rounded-md bg-slate-700 px-4 py-1.5 text-sm font-semibold text-white hover:bg-slate-800 dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-white">
          Editar
        </a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="rounded-md border border-red-300 px-4 py-1.5 text-sm font-semibold text-red-600 hover:bg-red-50 dark:border-red-800 dark:text-red-400 dark:hover:bg-red-950">
            Eliminar
          </button>
        </form>
      </div>
      @endauth
    </div>
  </article>
</x-layout>
