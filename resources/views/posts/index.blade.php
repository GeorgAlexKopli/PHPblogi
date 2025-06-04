<x-app-layout>
    <div class="max-w-5xl mx-auto p-8 bg-gray-800 min-h-screen">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-white">Blog Posts</h1>

            @auth
                <a href="{{ route('posts.create') }}" 
                   class="btn btn-primary px-6 py-2 rounded-full text-white">
                   + Create Post
                </a>
            @endauth
        </div>

        @foreach ($posts as $post)
            <div class="bg-gray-900 shadow-xl mb-8 rounded-xl overflow-hidden">
                <div class="p-8">
                    <h2 class="text-white text-3xl font-semibold mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-400 mb-4">
                        by {{ $post->author?->name ?? 'Unknown Author' }}
                    </p>
                    <p class="text-white leading-relaxed mb-6">
                        {{ $post->excerpt }}
                    </p>
                    <div class="text-right">
                        <a href="{{ route('posts.show', $post) }}" 
                           class="btn btn-primary px-5 py-2 rounded-full text-white">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-10 text-white">
            {{ $posts->links('vendor.pagination.daisyui') }}
        </div>
    </div>
</x-app-layout>
