@props([
    'color' => 'white',
    'stretch' => false,
    'header' => false,
    'headerBtn' => false,
    'icon' => false,
    'title' => false,
    'footer' => false,
    'bodyClass' => false,
    'flush' => false,
])

<div @class([
    "card bg-${color} {$attributes->get('class')}",
    'w-100' => $stretch,
    'card-flush' => $flush
])
    {{ $attributes->except('class') }}>

    @if ($header)
        <div @class(["card-header"])>
            <div class="card-title">
                <h2> {!! $header !!}</h2>
            </div>
        </div>
    @elseif($title || $headerBtn)
        <div @class(["card-header pt-5"])>
            @if ($title)
                <div class="card-title">
                    @if ($icon)
                        <span class="card-icon">
                            @svg($icon)
                        </span>
                    @endif
                    <h3 class="card-label">
                        {{ $title }}
                    </h3>
                </div>
            @endif

            @if ($headerBtn)
                <div class="card-toolbar">
                    {!! $headerBtn !!}
                </div>
            @endif
        </div>
    @endif

    <div @class(["card-body ${bodyClass}"])>
        {!! $slot !!}
    </div>

    @if ($footer)
        <div class="card-footer">
            {!! $footer !!}
        </div>
    @endif
</div>
