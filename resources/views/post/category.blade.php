<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Selection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="pt-5 px-2 md:p-5 grid grid-cols-1 md:grid-cols-5 gap-5">
                    <a href="{{url('category/Mechanic Keyboard')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Mechanic Keyboard</a>
                    <a href="{{url('category/Wireless Keyboard')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wireless Keyboard</a>
                    <a href="{{url('category/Wired Keyboard')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wired Keyboard</a>
                    <a href="{{url('category/Wireless Mouse')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wireless Mouse</a>
                    <a href="{{url('category/Wired Mouse')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wired Mouse</a>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>