<x-layout
        meta-title="Create new post"
        meta-description="Form to create a new description"
    >

    <h1>{{__('Create a new posts')}}</h1>

    @dump($errors->all())
    <form action="{{ route('posts.store') }}" method="POST">
        <br />
        @csrf

        @include('posts.form-field')

        <button type="submit">{{__('Send')}}</button>
    </form>
    <br />
    <a href="{{route('posts.index')}}">{{__('Back')}}</a>
</x-layout>
