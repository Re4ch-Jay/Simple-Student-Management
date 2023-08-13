<x-app-layout>
    <x-header name="Students List"/>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <x-search-bar action="{{ route('student.index') }}"/>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Student ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
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
                @foreach ($students as $student)
                    <tr class="bg-white border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $student->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $student->last_name }} {{ $student->first_name }} 
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $student->gender }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $student->email }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $student->phone_number }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $student->major->name }}
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $student->dob }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $student->address }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $student->pob }}
                        </td>
                        <td class="px-6 py-4 flex justify-between gap-2">
                            <a href="{{ route('student.edit', $student->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
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

    @if ($students->count() !== 0)
        <div class="mt-10">
            {{ $students->links()}}
        </div>
    @else
        <div class="text-center">
            There is no students in the list
        </div>
    @endif

</x-app-layout>