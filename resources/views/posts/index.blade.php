<x-layout meta-title="Home title" meta-description="home description">
  
  <h1>Blog</h1>
  <a href="{{route('posts.create')}}">Create a new Post</a>
  @foreach($posts as $post)
  <div>
    <h2 style="display: flex; align-items: baseline">
      <a href="{{route('posts.show', $post)}}">
              {{$post->title}}
      </a>
      </h2> &nbsp; 
    <a href="{{route('posts.edit', $post)}}">Edit</a> 
    <form action="{{route('posts.destroy', $post)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
    </div>
  @endforeach
</x-layout>