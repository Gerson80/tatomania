<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
