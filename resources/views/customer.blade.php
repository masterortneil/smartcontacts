<x-app-layout>

    @php
        $cInterests = isset($customer) ? $customer->interests->pluck('id')->toArray(): []
    @endphp
    <div class="p-10">

        <div class="grid min-h-screen justify-items-center">
            <div class="md:w-1/2">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                
                <h2 class="text-3xl mb-3 text-gray-500 uppercase text-center">Customer Information</h2>
                <form action="{{route('customer.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$customer->id ?? null}}">
                    <div class="flex justify-between gap-3">
                        <span class="w-1/2">
                              <label for="firstname" class="block text-xs font-semibold text-gray-600 uppercase">Name</label>
                              <input id="firstname" type="text" name="name" placeholder="John" autocomplete="given-name" value="{{$customer->name ?? old('name')}}" class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner"  />
                        </span>
                        <span class="w-1/2">
                          <label for="lastname" class="block text-xs font-semibold text-gray-600 uppercase">Surname</label>
                            <input id="lastname" type="text" name="surname" placeholder="Doe" autocomplete="family-name" value="{{$customer->surname ?? old('surname')}}" class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required />
                        </span>
                    </div>
                   <div>
                       <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                       <input id="email" type="email" name="email" placeholder="john.doe@company.com" autocomplete="email" value="{{$customer->email ?? old('email')}}" class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required />
                   </div>
                    <div>
                        <label for="dob" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Birth Date</label>
                        <input id="dob" type="date" name="dob" value="{{$customer->dob ?? old('dob')}}"  class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required />
                    </div>
                    <div>
                        <label for="idNumber" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Id Number</label>
                        <input id="idNumber" type="text" name="id_number" value="{{$customer->id_number ?? old('id_number')}}" placeholder="123455" class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required />
                    </div>
                    <div>
                        <label for="mobileNumber" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Mobile Number</label>
                        <input id="mobileNumber" type="text" name="mobile_number" value="{{$customer->mobile_number ?? old('mobile_number')}}" placeholder="123455" class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required />
                    </div>
                    <div>
                        <label for="language_id" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Language</label>
                        <select name="language_id" class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required>
                            @foreach($languages as $language)
                                <option value="{{$language->id}}" {{($customer->language_id ?? old('language_id')) == $language->id ? 'selected' : ''}}>{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="interests" class="block mt-2 text-xs font-semibold text-gray-600 "> <span class="uppercase">Interests</span> <small>(Press Ctrl for multiple)</small> </label>
                        <select name="interests[]" multiple class="block w-full p-3 mt-2 text-gray-700  appearance-none focus:outline-none  focus:shadow-inner" required>
                            @foreach($interests as $interest)
                                <option value="{{$interest->id}}" {{in_array($interest->id, $cInterests ) ? 'selected' : ''}}>{{$interest->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full rounded-md py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-400 shadow-lg focus:outline-none hover:bg-red-300">
                        Save
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
