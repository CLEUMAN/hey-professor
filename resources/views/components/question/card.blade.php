@props([
'question'
])

<div class="dark:text-gray-600 dark:bg-gray-300 my-4 p-2 rounded bg-white shadow shadow-blue-500/50 flex justify-between items-center">

    <div class="">
        {{$question->question}}
    </div>
    <div>
        <x-question.form :action="route('question.like', $question)" id="form-question-like-{{$question->id}}">
            <button class="flex items-start space-x-1 text-green-500" form="form-question-like-{{$question->id}}">
                <x-icons.thumbs-up class="w-5 h-5 hover:text-green-900 cursor-pointer"/>
                <span>{{$question->likes}}</span>
            </button>
        </x-question.form>

        <x-question.form :action="route('question.unlike', $question)" id="form-question-unlike-{{$question->id}}">
            <button class="flex items-start space-x-1 text-red-500" form="form-question-unlike-{{$question->id}}">
                <x-icons.thumbs-down class="w-5 h-5 hover:text-red-900 cursor-pointer"/>
                <span>{{$question->unlikes}}</span>
            </button>
        </x-question.form>

    </div>
</div>
