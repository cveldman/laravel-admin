<div {{ $attributes->merge(['class' => 'mt-8 flex flex-col']) }}>
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    @isset($thead)
                        <thead {{ $thead->attributes->class(['bg-gray-50']) }}>
                            {{ $thead }}
                        </thead>
                    @else
                        <thead class="bg-gray-50">
                            <tr>
                                @foreach ($columns as $column)
                                    @if ($loop->first)
                                        <x-th class="pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            {{ $column }}
                                        </x-th>
                                    @elseif ($loop->last)
                                        <x-th class="relative pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </x-th>
                                    @else
                                        <x-th class="px-3 text-left text-sm font-semibold text-gray-900">
                                            {{ $column }}
                                        </x-th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                    @endif

                    @isset($tbody)
                        <tbody {{ $thead->attributes->class(['divide-y divide-gray-200 bg-white']) }}>
                            {{ $tbody }}
                        </tbody>
                    @else
                        <tbody class="divide-y divide-gray-200 bg-white">
                            {{ $slot }}
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
