<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-600 border-b border-gray-200">
                <div class="mb-2">
                    <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=250 />
                </div>
                <h1 role="heading" aria-level="h1" class="fon-semibold text-1xl mb-4 text-white">Votre trouverez ci-dessous les réponses que avez apportés à
                    notre sondage </h1>
                    @foreach ($questions as $question)
                        <div class="bg-gray-200 p-2 my-2 rounded-md shadow-sm">
                            <h2 class="font-semibold">{{ $question->title }}</h2>
                            <p> {{ $question->body }} </p>
                            @foreach ($answers as $key => $value)
                                @if ($question->id == $key)
                                    <div class="border-dashed border-2 border-gray-800 p-2 my-2">
                                        <p>{{ $value }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
