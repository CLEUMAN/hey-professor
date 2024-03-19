<x-app-layout>
    <x-slot name="header">
        <x-layout.header>
            {{ __('My Questions') }}
        </x-layout.header>
    </x-slot>

    <x-layout.container>

        <x-question.form action="{{route('question.store')}}">

            <x-form.textarea label="Qual sua pergunta..." name="question"/>

            <x-btn.reset>Cancel</x-btn.reset>
            <x-btn.primary>Save</x-btn.primary>

        </x-question.form>

        <hr class="border-gray-700 border-dashed my-4">

        <div class="border dark:border-gray-700 dark:text-white dark:bg-gray-700  border-white rounded-xl bg-white
        shadow dark:shadow-gray-500 shadow-white  p-4">
            <p class="dark:text-gray-400 uppercase font-bold mb-1">My Questions</p>
            @foreach($questions as $question)
                <x-question.card :question="$question"/>
            @endforeach
        </div>



    </x-layout.container>>
</x-app-layout>
