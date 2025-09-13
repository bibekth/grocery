<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Add New Vendor Button -->
                <div class="flex justify-end mb-4">
                    <a href="{{ route('vendors.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Add New Vendor') }}
                    </a>
                </div>

                <!-- Vendors Table -->
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Firm Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Contact Person
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Contact No.
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Address
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    PAN/VAT
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @foreach ($data as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->firm_name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $item->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $item->contact }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $item->email }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $item->address }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $item->pan_vat != null ? $item->pan_vat : '-' }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full dark:bg-green-200 dark:text-green-900">Active</span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2 gap-2">
                                                <a href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                <form action="#" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this vendor?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                            </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="py-4 px-6" colspan="8">
                                        <span class="flex justify-center">No Data Found</span>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Placeholder -->
                <div class="py-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
