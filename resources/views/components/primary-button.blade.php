<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-md bg-slate-700 px-5 py-2 font-semibold text-white shadow-sm transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 disabled:opacity-50 dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-white dark:focus:ring-offset-slate-900']) }}>
    {{ $slot }}
</button>
