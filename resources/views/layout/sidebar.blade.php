<!-- Static sidebar for desktop -->
<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow pt-5 bg-indigo-700 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
        </div>
        <div class="mt-5 flex-1 flex flex-col">
            <nav class="flex-1 px-2 pb-4 space-y-1">
                @foreach(app('sidebar')->items as $key => $value)
                    @isset($value['policy'])
                        @can($value['policy'][0], $value['policy'][1])
                            <a href="{{ route($key) }}" class="@if(Request::is(route($key) == '/admin' ? [substr(route($key, [], false), 1), substr(route($key, [], false), 1) . '/*'] : substr(route($key, [], false), 1))) bg-indigo-800 text-white @else text-indigo-100 hover:bg-indigo-600 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                {!! $value['icon'] !!} {{ __($value['name']) }}
                            </a>
                        @endcan
                    @else
                        <a href="{{ route($key) }}" class="@if(Request::is(route($key) == '/admin' ? [substr(route($key, [], false), 1), substr(route($key, [], false), 1) . '/*'] : substr(route($key, [], false), 1))) bg-indigo-800 text-white @else text-indigo-100 hover:bg-indigo-600 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            {!! $value['icon'] !!} {{ __($value['name']) }}
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>
</div>
