<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Blog Posts</h1>

        @foreach ($posts as $post)
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h2 class="card-title text-xl">{{ $post->title }}</h2>
                    <p class="text-gray-600">{{ $post->excerpt }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary mt-2">Read More</a>
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->links('vendor.pagination.daisyui') }}
        </div>
    </div>
</x-app-layout>
