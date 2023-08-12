@props(['type', 'name', 'label', 'value'])
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
<x-forms.error name="{{ $name }}"/>