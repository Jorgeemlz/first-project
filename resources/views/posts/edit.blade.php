<x-layout :meta-title="$post->title" :meta-description="$post->body">
<h1 class="mt-16 text-center text-4xl font-bold">Edit form</h1>

<form action="{{ route('posts.update', $post) }}" method="POST" class="mx-auto mt-8 max-w-xl px-6">
    @csrf
    @method('PATCH')

    @include('posts.partials.form-fields')

    <div class="mt-6 flex items-center justify-between">
        <a href="{{route('posts.index')}}" class="text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200">Back</a>
        <x-primary-button>Send</x-primary-button>
    </div>
</form>
</x-layout>
