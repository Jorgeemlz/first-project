<x-app-layout
        meta-title="Create new post"
        meta-description="Form to create a new description"
    >

    <h1>{{__('Create a new post')}}</h1>

        <x-slot name="header">
        <h1 class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200">
          {{__('Create a new posts')}};
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="mx-auto max-w-7xl px-6">
            <div class="overflow-hidden rounded-md bg-white shadow-sm dark:bg-slate-800">
                <div class="p-6 text-slate-900 dark:text-slate-100">
                    ¡Iniciaste sesión, {{ auth()->user()->name }}!
                </div>
            </div>
        </div>
    </div> 

    <form action="{{ route('posts.store') }}" method="POST" class="mx-auto mt-8 max-w-xl px-6">
        @csrf

        @include('posts.partials.form-fields')

        <div class="mt-6 flex items-center justify-between">
            <a href="{{route('posts.index')}}" class="text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200">{{__('Back')}}</a>
            <x-primary-button>{{__('Send')}}</x-primary-button>
        </div>
    </form>
</x-app-layout>
