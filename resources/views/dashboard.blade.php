<x-app-layout>


    <div class="p-10">
        <div class=" mb-4">
            <a class="rounded-lg bg-green-500 px-4 py-2 text-white" href="{{route('customer.create')}}">Create</a>
        </div>
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full overflow-x-auto">
                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                   Customers
                </div>
                <div class="p-3">
                    <table class="table-responsive w-full rounded"  >
                        <thead align="left">
                        <tr>
                            <th class="border px-2 py-2">Name</th>
                            <th class="border px-2 py-2">Email</th>
                            <th class="border px-2 py-2">ID Number</th>
                            <th class="border px-2 py-2">Mobile</th>
                            <th class="border px-2 py-2">DOB</th>
                            <th class="border px-2 py-2">Language</th>
                            <th class="border px-2 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td class="border px-2 py-2">{{$customer->name}}</td>
                                    <td class="border px-2 py-2">{{$customer->email}}</td>
                                    <td class="border px-2 py-2">{{$customer->id_number}}</td>
                                    <td class="border px-2 py-2">{{$customer->mobile_number}}</td>
                                    <td class="border px-2 py-2">{{$customer->dob}}</td>
                                    <td class="border px-2 py-2">{{$customer->language->name}}</td>

                                    <td class="border px-2 py-2 flex" >
                                        <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 " href="{{route('customer.edit', $customer->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 text-blue-500">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <div class="mt-1">
                                            <form action="{{route('customer.delete',$customer->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 text-red-500 ">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
