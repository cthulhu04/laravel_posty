@props(['post' => $post])

<div>
    <div class="mb-4">
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }} 
        <span class="text-gray-600 text-sm">{{ $post->created_at->toTimeString() }}</span></a>
        <p class="mb-4">{{$post->body}}</p>
    </div>


   
    @can('delete', $post)
    <form action="{{ route('posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete</button>
    </form>
   @endcan

    <div class="flex items-center">
        @auth
            @if( !$post->likedBy(auth()->user()) )
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif

        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('likes', $post->likes->count()) }}</span>
    </div>
</div>