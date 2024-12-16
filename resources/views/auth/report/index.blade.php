<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Список заявлений') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-nav-link :href="route('reports.create')">
                    {{__('Создать заявление')}}
                </x-nav-link>
                @foreach($reports as $report)
                <p>{{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y') }}</p>
                <p>{{$report->number}}</p>
                <p>{{$report->description}}</p>
                <p>{{$report->status->name}}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>