@props(['title', 'average', 'rating', 'count'])

<div class="border flex gap-2 flex-col border-primary-700 p-4 rounded-lg w-full">
    <span class="text-md tracking-wide">{{ $title }}</span>
    <h2>{{ $average }}</h2>
    <div class="text-sm py-2 px-4 bg-blue-500 text-white rounded-md w-max">
        {{ $rating }}
    </div>
    <div class="flex items-center gap-2 py-2">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                clip-rule="evenodd" />
        </svg>
        <span class="text-sm">{{ $count }}</span>
    </div>
</div>
