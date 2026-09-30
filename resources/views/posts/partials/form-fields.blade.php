<div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" type="text" name="title" :value="old('title', $post->title)" />
    <x-input-error :messages="$errors->get('title')" />
</div>

<div class="mt-4">
    <x-input-label for="body" :value="__('Body')" />
    <x-textarea-input id="body" name="body">{{ old('body', $post->body) }}</x-textarea-input>
    <x-input-error :messages="$errors->get('body')" />
</div>
