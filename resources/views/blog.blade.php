<x-layout meta-title="Home title" meta-description="home description">
  <h1>Blog</h1>
  @foreach($posts as $post)
    <h2>{{ $post->title}}</h2> 
  @endforeach
</x-layout>