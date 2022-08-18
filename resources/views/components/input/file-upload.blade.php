<div class="flex items-center">
    <input type="file" {{ $attributes }}>
    <div wire:loading wire:target="{{ $attributes['id'] }}">Uploading...</div>
</div>