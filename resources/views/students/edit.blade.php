<x-app-layout>
    <x-header name="Edit Student"/>
 <form method="POST" action="{{ route('student.update', $student->id) }}" >
   @method("PUT")
    @csrf
     <div class="relative z-0 w-full mb-6 group">
         <x-forms.input-edit value="{{ $student->first_name }}" type="text" name="first_name" label="First Name"/>
     </div>
     <div class="relative z-0 w-full mb-6 group">
         <x-forms.input-edit value="{{ $student->last_name }}" type="text" name="last_name" label="Last Name"/>
     </div>
     <div class="relative z-0 w-full mb-6 group">
          <x-forms.input-edit value="{{ $student->email }}" type="email" name="email" label="Email"/>
     </div>
     <div class="relative z-0 w-full mb-6 group">
          <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
          <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="Male" {{ $student->gender === "Male" ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $student->gender === "Female" ? 'selected' : '' }}>Female</option>
          </select>
    </div>
    <div class="relative z-0 w-full mb-6 group">
       <label for="major" class="block mb-2 text-sm font-medium text-gray-900">Major</label>
       <select id="major" name="major_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
       @foreach ($majors as $major)
          <option value="{{ $major->id }}" {{ $student->major_id === $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
       @endforeach
    </select>
     
    </div>
     <div class="grid md:grid-cols-2 md:gap-6">
       <div class="relative z-0 w-full mb-6 group">
          <x-forms.input-edit value="{{ $student->dob }}" type="date" name="dob" label="Date Of Birth"/>
       </div>
       <div class="relative z-0 w-full mb-6 group">
          <x-forms.input-edit value="{{ $student->pob }}" type="text" name="pob" label="Place Of Birth"/>
       </div>
     </div>
     <div class="grid md:grid-cols-2 md:gap-6">
       <div class="relative z-0 w-full mb-6 group">
          <x-forms.input-edit value="{{ $student->address }}" type="text" name="address" label="Address"/>
       </div>
       <div class="relative z-0 w-full mb-6 group">
          <x-forms.input-edit value="{{ $student->phone_number }}" type="tel" name="phone_number" label="Phone Number"/>
       </div>
     </div>
     <x-forms.button-submit/>
   </form>
   
 </x-app-layout>