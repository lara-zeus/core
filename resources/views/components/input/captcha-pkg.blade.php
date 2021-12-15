{!! \NoCaptcha::display() !!}
@once
    @push('scripts')
        {!! \NoCaptcha::renderJs() !!}
    @endpush
@endonce
