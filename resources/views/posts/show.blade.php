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

            <!-- Comments Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8 p-6">
                <h3 class="text-lg font-semibold mb-4">Comments ({{ $post->comments->count() }})</h3>

                @auth
                <!-- Comment Form -->
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-6">
                    @csrf
                    <textarea
                        name="body"
                        rows="3"
                        placeholder="Add your comment..."
                        required
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    ></textarea>
                    <button type="submit" class="btn btn-primary mt-2 px-4 py-2 rounded-full">
                        Post Comment
                    </button>
                </form>
                @else
                <p class="mb-4 text-gray-600 italic">Please <a href="{{ route('login') }}" class="text-indigo-600 underline">log in</a> to comment.</p>
                @endauth

                <!-- Display Comments -->
                @forelse ($post->comments as $comment)
                    <div class="border-b border-gray-200 py-3">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-semibold">{{ $comment->user->name ?? 'Deleted User' }}</span>
                                <span class="text-sm text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>

                            @auth
                                @if (auth()->id() === $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                        <p class="mt-1">{{ $comment->body }}</p>
                    </div>
                @empty
                    <p class="text-gray-600 italic">No comments yet.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
