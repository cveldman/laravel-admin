@can($policy)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $isCurrent() ? 'bg-indigo-800 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md']) }}>
        @include('icons.' . $icon)
        {{ $slot }}
    </a>
@endcan

