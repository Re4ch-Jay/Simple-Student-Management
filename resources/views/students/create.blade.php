<x-app-layout>
   <x-header name="Register Student"/>
<form>
    <div class="relative z-0 w-full mb-6 group">
        <x-forms.input type="text" name="first_name" label="First Name"/>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-forms.input type="text" name="last_name" label="Last Name"/>
    </div>
    <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="email" name="email" label="Email"/>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <x-forms.input type="text" name="gender" label="Gender"/>
   </div>
    <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="date" name="dob" label="Date Of Birth"/>
      </div>
      <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="text" name="pob" label="Place Of Birth"/>
      </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="text" name="address" label="Address"/>
      </div>
      <div class="relative z-0 w-full mb-6 group">
         <x-forms.input type="text" name="phone_number" label="Phone Number"/>
      </div>
    </div>
    <x-forms.button-submit/>
  </form>
  
</x-app-layout>