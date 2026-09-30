@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-slate-900 focus:border-slate-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-slate-400 disabled:opacity-50 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 dark:focus:bg-slate-700']) }}>
