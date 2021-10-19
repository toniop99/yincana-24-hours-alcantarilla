<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('pages.quiz.title', ['storeName' => $question->store]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--                    Header with question--}}
                    <h1>{{$question->question}}</h1>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{route('quiz', ["code" => $question->code])}}">
                            @csrf

                            <input type="radio" value="{{$question->answer_1}}" name="answer" id="option-1" required checked>
                            <input type="radio" value="{{$question->answer_2}}" name="answer" id="option-2" required>
                            <input type="radio" value="{{$question->answer_3}}" name="answer" id="option-3" required>

                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>{{$question->answer_1}}</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>{{$question->answer_2}}</span>
                            </label>
                            <label for="option-3" class="option option-3">
                                <div class="dot"></div>
                                <span>{{$question->answer_3}}</span>
                            </label>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-3 bg-yellow-600	hover:bg-yellow-700 active:bg-yellow-900">
                                    {{ __('pages.quiz.send-answer') }}
                                </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
