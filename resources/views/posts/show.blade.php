<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $post->title }}
        </h2>
        <p class="text-sm text-gray-600">
            Author: {{ $post->author?->name ?? 'Unknown' }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('posts.index') }}"
                   class="btn btn-outline px-4 py-2 rounded-full text-white border-white hover:bg-white hover:text-gray-800 transition">
                    ← Back to Posts
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ $post->content }}</p>

                    @auth
                        @if (auth()->id() === $post->user_id)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-6">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit"
                                    class="btn px-5 py-2 rounded-full text-black bg-red-500 hover:bg-red-600 transition"
                                    onclick="return confirm('Are you sure you want to delete this post?')"
                                >
                                    🗑️ Delete Post
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
