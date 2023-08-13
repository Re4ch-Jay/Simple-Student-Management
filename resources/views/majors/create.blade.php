<x-app-layout>
    <x-header name="Create Major"/>
 <form method="POST" action="{{ route('major.store') }}" >
    @csrf
     <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="text" name="name" label="Major Name"/>
     </div>
     <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="text" name="description" label="Description"/>
     </div>
     <x-forms.button-submit/>
   </form>
   
 </x-app-layout>