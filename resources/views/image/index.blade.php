<x-guest-layout>
    <div class="min-h-screen w-screen flex items-center justify-center bg-gray-900 text-gray-200">
        <div class="text-primary">
            <form hx-post="{{route('image.process')}}" hx-target="#imageResult" hx-swap="innerHTML" enctype="multipart/form-data" class="flex flex-col space-y-4 mb-4">
                @csrf
                <input type="file" name="image" accept="image/*">
                <button type="submit" class="bg-blue-400 p-4 rounded-lg font-bold text-lg rounded-lg">Process</button>
            </form>
            <div id="imageResult" class="rounded-lg overflow-hidden">
            </div>
        </div>
    </div>
</x-guest-layout>
