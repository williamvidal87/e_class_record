@if ($errors->any())
    <div {{ $attributes }} style="line-height: 1.6;">
        {{-- <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div> --}}

        {{-- <ul class="mt-3 list-disc list-inside text-sm text-red-600"> --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        {{-- </ul> --}}
    </div>
@endif
