<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-gray-900 focus:outline-none focus:ring-2 focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
