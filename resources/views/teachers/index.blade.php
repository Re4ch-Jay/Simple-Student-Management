<x-app-layout>
    <x-header name="Teachers List"/>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teacher ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Major
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Of Birth
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Place of Birth
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr class="bg-white border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $teacher->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $teacher->last_name }} {{ $teacher->first_name }} 
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $teacher->subject }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $teacher->gender }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $teacher->email }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $teacher->phone_number }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $teacher->major->name }}
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $teacher->dob }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $teacher->address }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $teacher->pob }}
                        </td>
                        <td class="px-6 py-4 flex justify-between gap-2">
                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
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

    @if  ($teachers->count() !== 0)
        <div class="mt-10">
            {{ $teachers->links()}}
        </div>
    @else
        <div class="text-center">
            There is no teachers in the list
        </div>
    @endif

</x-app-layout>