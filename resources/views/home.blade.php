<x-layout :title="$title">
    <p>Welcome to my home page</p>
    <div class="flex mt-3">
        @for ($i = 0; $i < 10; $i++)
            @if ($i % 2 !== 0)
                <div class="w-8 h-8 bg-teal-500 text-white p-0 me-1 text-xs grid place-items-center">
                    <p class="text-gray-700">{{ $i }}</p>
                </div>
            @endif
        @endfor
    </div>
</x-layout>
