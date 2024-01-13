<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post -> title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="p-2 md:p-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach($images as $image)
                            <div class="h-64 overflow-hidden">
                                <a href="{{url('img/'.$image->id)}}">
                                    <img src="{{ asset('storage/'.$image -> photo) }}" style="height: 100%; width: 300px;">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="font-bold text-lg pt-5 md:pt-10 md:text-xl">
                        <div class="flex justify-between">
                            <div>{{$post -> title}}</div>
                            <a href="{{url('category/'.$post->category)}}">{{$post -> category}}</a>
                        </div>
                        <div class="pt-3 md:pt-5">{{$post -> content}}</div>
                    </div>
                    <div class="flex justify-center pt-5 md:pt-10">
                        <a href="https://www.facebook.com/profile.php?id=100093825970378&mibextid=ZbWKwL" class="bg-slate-300 px-10 py-5 shadow-xl">Buy</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
