<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

            @if ($post)
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
            @else
                <p>Post not found.</p>
            @endif

        <a href="{{ route('posts.index') }}" class="btn btn-outline mt-6">← Back to Blog</a>
    </div>
</x-app-layout>
