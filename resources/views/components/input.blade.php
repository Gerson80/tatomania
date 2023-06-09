@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-b-black px-3 autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none']) !!}>
