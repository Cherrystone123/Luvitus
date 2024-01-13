<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="p-2 md:p-10">
                    <form method="POST" action="{{ url('admin/update/'.$post->id) }}" class="grid grid-cols-1 gap-2 font-bold" enctype="multipart/form-data">
                        @csrf
                        <label class="text-xl">Title</label>
                        <input type="text" name="title" placeholder="Enter title.." value="{{ old('title', $post->title) }}">
                        <label class="text-xl">Content</label>
                        <input type="text" name="content" placeholder="Enter Content.." value="{{ old('content', $post->content) }}">
                        <label class="text-xl" for="photos">Photos</label>
                        <input type="file" name="photos[]" multiple id="input"value="">
                        <label class="text-xl">Category</label>
                        <select name="category">
                            <option value="Mechanic Keyboard">Mechanic Keyboard</option>
                            <option value="Wireless Keyboard">Wireless Keyboard</option>
                            <option value="Wired Keyboard">Wired Keyboard</option>
                            <option value="Wireless Mouse">Wireless Mouse</option>
                            <option value="Wired Mouse">Wired Mouse</option>
                        </select>
                        <div class="flex justify-center">
                            <button type="submit" class="px-5 py-3 bg-slate-400 text-white shadow-xl">Update</button>
                        </div>
                        <section class="grid gap-5 md:grid-cols-4">
	                        @foreach ($images as $image)
					            <div>
					                <img src="{{ asset('storage/'.$image -> photo) }}" alt="Existing Image">
					                <input type="checkbox" name="remove_images[]" value="{{ $image -> photo }}"> Remove
					            </div>
					        @endforeach
				    	</section>
                    </form>
                    <output></output>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    const input = document.querySelector("input#input");
    input.addEventListener("change", function (event) {
        const outputElement = document.querySelector('output');

        for (let i = 0; i < event.target.files.length; i++) {
            const img = document.createElement("img");
            const file = event.target.files[i];
            const imageURL = URL.createObjectURL(file); // Convert File to URL

            img.setAttribute("src", imageURL);
            outputElement.appendChild(img);
        }
    });
</script>