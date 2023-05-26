@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 border-transparent border-b-black hover:border-2 hover:border-white bg-transparent  bg-transparent']) !!}>
