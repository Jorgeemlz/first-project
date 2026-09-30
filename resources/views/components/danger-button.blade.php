<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-md border border-red-300 px-5 py-2 font-semibold text-red-600 transition hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 disabled:opacity-50 dark:border-red-800 dark:text-red-400 dark:hover:bg-red-950 dark:focus:ring-offset-slate-900']) }}>
    {{ $slot }}
</button>
