@props(['action'])

<form class="my-5 flex justify-between items-center" action="{{ $action }}">
    <input type="text" name="search" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
    <x-forms.button-submit/>
</form>