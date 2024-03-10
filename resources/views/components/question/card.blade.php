@props([
'question'
])

<div class="dark:text-gray-400 my-4 p-2 rounded bg-white shadow shadow-blue-500/50 flex justify-between items-center">

    <div class="">
        {{$question->question}}
    </div>
    <div>
        <x-question.form :action="route('question.like', $question)" id="form-question-{{$question->id}}">
            <button class="flex items-start space-x-1 text-green-500" form="form-question-{{$question->id}}">
                <x-icons.thumbs-up class="w-5 h-5 hover:text-green-900 cursor-pointer"/>
                <span>{{$question->likes}}</span>
            </button>
        </x-question.form>

        <a href="{{route('question.like', $question)}}" class="flex items-start space-x-1 text-red-500">
            <x-icons.thumbs-down class="w-5 h-5 hover:text-red-900 cursor-pointer"/>
            <span>{{$question->unlikes}}</span>
        </a>

    </div>
</div>
