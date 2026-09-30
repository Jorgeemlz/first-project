<label class="block">
    <span class="font-medium">{{ __('Title') }}</span>
    <input type="text" name="title" value="{{ old('title', $post->title) }}"
        class="mt-1 block w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-slate-900 focus:border-slate-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-slate-400 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 dark:focus:bg-slate-700" />
    @error('title')
        <small class="mt-1 block text-red-500">{{ $message }}</small>
    @enderror
</label>

<label class="mt-4 block">
    <span class="font-medium">{{ __('Body') }}</span>
    <textarea name="body" rows="6"
        class="mt-1 block w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-slate-900 focus:border-slate-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-slate-400 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 dark:focus:bg-slate-700">{{ old('body', $post->body) }}</textarea>
    @error('body')
        <small class="mt-1 block text-red-500">{{ $message }}</small>
    @enderror
</label>
