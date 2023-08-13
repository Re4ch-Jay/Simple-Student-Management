<x-app-layout>
    <x-header name="majors List"/>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Major Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($majors as $major)
                    <tr class="bg-white border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $major->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $major->description }}
                        </th>
                        <td class="px-6 py-4 flex justify-between gap-2">
                            <a href="{{ route('major.edit', $major->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('major.destroy', $major->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button 
                                    type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                 >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if  ($majors->count() !== 0)
        <div class="mt-10">
            {{ $majors->links()}}
        </div>
    @else
        <div class="text-center">
            There is no majors in the list
        </div>
    @endif

</x-app-layout>