<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="md:p-10 py-3 grid grid-cols-1 md:grid-cols-4 gap-64">
                    @foreach($posts as $post)
                        <div class="flip-card">
                            <div class="flip-card-inner shadow-xl rounded-lg">
                                <div class="flip-card-front bg-slate-300 h-full max-w-full">
                                    @foreach($images as $image)
                                        @if($image -> post_id == $post -> id)
                                            <img src="{{ asset('storage/'.$image -> photo) }}" class="h-full w-auto">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="flip-card-back bg-slate-300 overflow-hidden">
                                    <h1 class="p-5 bg-slate-500 text-white">{{$post -> title}}</h1> 
                                    <p class="pt-2">{{$post -> content}}</p> 
                                    <a href="{{url('category/'.$post->category)}}">{{$post -> category}}</a>
                                    <div class="p-1 flex justify-between">
                                        <a href="{{ url('posts/'.$post->id) }}" class="bg-slate-200 upparcase font-bold p-1">Buy</a>
                                        @if(Auth::user()->email == env("ADMIN"))
                                            <a href="{{ url('admin/edit/'.$post->id) }}"class="bg-slate-200 upparcase font-bold p-1">Edit</a>
                                            <form method="POST" action="{{ url('admin/destroy/' . $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-slate-200 uppercase font-bold p-1">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.flip-card-front {
    overflow: hidden;
}
.flip-card-back {
  transform: rotateY(180deg);
}
</style>