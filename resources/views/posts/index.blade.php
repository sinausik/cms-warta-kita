@extends('layouts.app')

@section('content')
<div class="mb-10 text-center">
    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Kabar Warga Terbaru</h1>
    <p class="mt-4 text-lg text-gray-600">Dapatkan informasi langsung dari sumbernya, ditulis oleh warga untuk warga.</p>
</div>

<div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($posts as $post)
    <article class="flex flex-col items-start transition-all hover:-translate-y-1">
        <div class="relative w-full">
            <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : 'https://placehold.co/600x400?text=No+Image' }}" 
                 alt="{{ $post->title }}" 
                 class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2] shadow-sm">
        </div>
        <div class="max-w-xl">
            <div class="mt-6 flex items-center gap-x-4 text-xs">
                <time datetime="{{ $post->published_at }}" class="text-gray-500">
                    {{ $post->published_at->isoFormat('D MMMM Y') }}
                </time>
                <span class="relative z-10 rounded-full bg-blue-50 px-3 py-1.5 font-medium text-blue-600">
                    {{ $post->category->name }}
                </span>
            </div>
            <div class="group relative">
                <h3 class="mt-3 text-xl font-bold leading-6 text-gray-900 group-hover:text-blue-600">
                    <a href="{{ route('posts.show', $post->slug) }}">
                        <span class="absolute inset-0"></span>
                        {{ $post->title }}
                    </a>
                </h3>
                <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600">
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </p>
            </div>
            <div class="mt-6 flex items-center gap-x-3 border-t border-gray-100 pt-4">
                <div class="text-sm leading-6">
                    <p class="font-bold text-gray-900">
                        <span class="text-gray-400 font-normal">Oleh</span> {{ $post->author->name }}
                    </p>
                </div>
            </div>
        </div>
    </article>
    @endforeach
</div>

<div class="mt-16">
    {{ $posts->links() }}
</div>
@endsection