<x-app-layout>
    @if(isset($correctAnswer) && $correctAnswer)
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Has respondido la pregunta correctamente!</p>
                    <p class="text-sm">Puedes ver como vas desde el bot de telegram o desde tu <a class="text-black font-bold" href="{{route('dashboard')}}">perfil aquí</a></p>
                </div>
            </div>
        </div>
    @elseif(isset($correctAnswer) && !$correctAnswer)
        <div class="bg-red-400 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Has fallado la pregunta.. pero..</p>
                    <p class="text-sm">No te preocupes! aún quedan un montón de preguntas por contestar! Puedes ver como vas desde tu <a class="text-black font-bold" href="{{route('dashboard')}}">perfil aquí</a></p>
                </div>
            </div>
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('pages.dashboard.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-black font-bold text-xl">Mi perfil</h1>

                    @if(isset($quizData))
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <div>Preguntas acertadas: <span class="text-green-600 font-bold text-lg">{{$quizData['correct']}}</span></div>
                            <div>Preguntas falladas: <span class="text-red-600 font-bold text-lg">{{$quizData['failed']}}</span></div>
                            <div>Preguntas sin responder: <span class="text-gray-600 font-bold text-lg">{{$quizData['noResponse']}}</span></div>
                        </div>

                        <table class="table-fixed mt-4 w-full">
                            <thead>
                            <tr>
                                <th class="w-1/4 px-4 py-2">Comercio</th>
                                <th class="w-1/4 px-4 py-2">Respuesta</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($quizData['questions'] as $question)

                                    <tr>
                                        <td class="border px-4 py-2">
                                            <a class="text-yellow-700 hover:text-yellow-500 hover:underline" target="_blank" href="{{$question['store_url']}}">
                                                {{$question['store']}}
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            @if($question['status'] === null)
                                                <p class="text-gray-600 font-bold">Sin respoder</p>
                                            @elseif($question['status'] === false)
                                                <p class="text-red-600 font-bold">Fallada</p>
                                            @elseif($question['status'] === true)
                                                <p class="text-green-600 font-bold">Acertada</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>
        </div>
    </div>

    @if(isset($correctAnswer) && $correctAnswer)
        <script>start()</script>
    @endif
</x-app-layout>
