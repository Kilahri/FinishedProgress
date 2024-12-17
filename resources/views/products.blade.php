<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center text-2xl font-bold text-black">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-container">
                    <header class="p-4 flex justify-between items-center">
                        <form action="" method="GET" class="flex items-center space-x-2">
                            <input
                                type="text"
                                name="search"
                                class="form-input border border-gray-400 rounded-lg p-2"
                                placeholder="Search products..."
                                value="{{ request('search') }}">
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Search</button>
                        </form>
                        <a href="{{ route('product.create') }}" class="flex items-center gap-2 bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            New Product
                        </a>
                    </header>
                    <table class="min-w-full border-collapse border border-gray-300 bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 text-left text-gray-800 uppercase text-sm">
                                <th class="py-3 px-6">Image</th>
                                <th class="py-3 px-6">Product Name</th>
                                <th class="py-3 px-6">Category</th>
                                <th class="py-3 px-6">Price</th>
                                <th class="py-3 px-6">Stocks</th>
                                <th class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="border-b border-gray-200">
                                <td class="py-3 px-6">
                                    <img src="{{ asset('storage/Uploads/Product Images/' . $product->product_image) }}" class="w-10 h-10 rounded-full">
                                </td>
                                <td class="py-3 px-6 text-gray-700">{{ $product->product_name }}</td>
                                <td class="py-3 px-6 text-gray-600">{{ $product->category->category_name }}</td>
                                <td class="py-3 px-6 text-gray-700">{{ $product->price }}</td>
                                <td class="py-3 px-6 text-gray-700">{{ $product->stocks }}</td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <a href="{{ route('product.edit', $product->product_id) }}" class="bg-gray-800 text-white py-1 px-4 rounded hover:bg-gray-600 transition duration-300">
                                        Edit
                                    </a>
                                    <form action="{{ route('product.delete', $product->product_id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="bg-gray-800 text-white py-1 px-4 rounded hover:bg-gray-600 transition duration-300"
                                            onclick="return confirm('Are you sure you want to delete this product?');">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                showToast("{{ session('type') }}", "{{ session('message') }}");
            });
        </script>
    @endif
</x-app-layout>
