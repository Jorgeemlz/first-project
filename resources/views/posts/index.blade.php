<x-layout meta-title="Blog" meta-description="Listado de posts del blog">

  <h1 class="mt-12 text-center font-serif text-6xl font-bold text-sky-600 dark:text-sky-400">Blog</h1>

  @auth
  {{-- Botón redondo "+" para crear un post: solo con sesión iniciada --}}
  <div class="mt-4 mb-10 flex justify-center">
    <a href="{{ route('posts.create') }}" aria-label="Crear nuevo post" title="Crear nuevo post"
      class="flex h-11 w-11 items-center justify-center rounded-full bg-sky-600 text-white shadow-lg transition hover:bg-sky-700 hover:shadow-xl dark:bg-sky-500 dark:hover:bg-sky-400">
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" d="M12 5v14M5 12h14" />
      </svg>
    </a>
  </div>
  @else
  {{-- Sin sesión no hay botón, solo dejamos el mismo espacio antes de las tarjetas --}}
  <div class="mb-10"></div>
  @endauth

  {{-- Contenedor de las tarjetas: 1 columna en celular, 2 en tablet, 3 en pantalla grande --}}
  <div class="mx-auto grid max-w-7xl gap-4 px-6 pb-16 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($posts as $post)
      {{-- "relative" + el link con "after:absolute after:inset-0" hacen que TODA la tarjeta sea clickeable --}}
      <article class="relative flex flex-col rounded-md bg-white p-6 shadow transition hover:shadow-lg dark:bg-slate-800">

        <h2 class="text-xl font-semibold text-slate-800 dark:text-slate-100">
          <a href="{{ route('posts.show', $post) }}" class="after:absolute after:inset-0 hover:underline">
            {{ $post->title }}
          </a>
        </h2>

        <p class="mt-3 flex-1 leading-relaxed text-slate-600 dark:text-slate-300">
          {{ Str::limit($post->body, 150) ?: 'Sin contenido.' }}
        </p>

        {{-- Autor y fecha --}}
        <div class="mt-8 flex items-center gap-3">
          <span class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-200 text-slate-700 dark:bg-slate-700 dark:text-slate-100">
            JG
          </span>
          <div class="text-sm">
            <p class="font-semibold text-slate-700 dark:text-slate-200">Jorge García</p>
            <p class="text-slate-500 dark:text-slate-400">{{ $post->created_at?->format('M j, Y') }}</p>
          </div>
        </div>
      </article>
    @empty
      <p class="col-span-full text-center text-slate-500 dark:text-slate-400">
        Todavía no hay posts. ¡Crea el primero!
      </p>
    @endforelse
  </div>
</x-layout>
