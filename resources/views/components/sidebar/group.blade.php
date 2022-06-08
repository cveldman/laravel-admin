@if($slot != '')
    <div class="space-y-1">
        <h3 class="px-3 text-xs font-semibold text-white uppercase tracking-wider my-4 mt-9" id="projects-headline">
            {{ $title }}
        </h3>
        <div class="space-y-1" role="group" aria-labelledby="projects-headline">
            {{ $slot }}
        </div>
    </div>
@endif
