<x-app-layout>
   <x-header name="Edit Major"/>
<form method="POST" action="{{ route('major.update', $major->id) }}" >
   @method("PUT")
   @csrf
      <div class="relative z-0 w-full mb-6 group">
         <x-forms.input-edit value="{{ $major->name }}" type="text" name="name" label="Major Name"/>
      </div>
      <div class="relative z-0 w-full mb-6 group">
         <x-forms.input-edit value="{{ $major->description }}" type="text" name="description" label="Description"/>
      </div>
    <x-forms.button-submit/>
  </form>
  
</x-app-layout>