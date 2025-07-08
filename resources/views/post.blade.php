<x-master-layout :title="$title">

        <article class="py-8 max-w-screen-md">
         <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500"><a href="#">{{ $post['author'] }}</a> | 1 Januari 2025</div>
            <p class="my-4 font-light">{{ $post['body'] }}</p>
            <a class="text-blue-600 hover:underline" href="{{ route('posts') }}">&laquo; Back to all posts.</a>
        </article>
</x-master-layout>
