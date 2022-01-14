@props([
'name' => $name,
'label' => $label,
'type' => $type,
'old' => $old
])

<div class="mb-4">
    <label for="{{ $name }}" class="text-sm mb-2 block font-bold">{{ $label }}</label>
    <input type="{{ $type }}" class="mb-1 p-3 bg-white border-2 appearance-none outline-none border-gray-200 focus:border-indigo-500 rounded transition w-full" id="{{ $name }}" name="{{ $name }}" value="{{ $old }}">
    @error($name)
    <small class="text-sm text-red-500 font-medium">{{ $message }}</small>
    @enderror
</div>