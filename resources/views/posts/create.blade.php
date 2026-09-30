<x-layout
        meta-title="Create new post"
        meta-description="Form to create a new description"
    >

    <h1 class="mt-16 text-center text-4xl font-bold">{{__('Create a new posts')}}</h1>

    @dump($errors->all())
    <form action="{{ route('posts.store') }}" method="POST" class="mx-auto mt-8 max-w-xl px-6">
        @csrf

        @include('posts.form-field')

        <div class="mt-6 flex items-center justify-between">
            <a href="{{route('posts.index')}}" class="text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200">{{__('Back')}}</a>
            <button type="submit"
                class="rounded-md bg-slate-700 px-5 py-2 font-semibold text-white shadow-sm hover:bg-slate-800 dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-white">
                {{__('Send')}}
            </button>
        </div>
    </form>
</x-layout>
