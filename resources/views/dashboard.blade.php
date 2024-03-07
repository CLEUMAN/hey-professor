<x-app-layout>
    <x-slot name="header">
        <x-layout.header>
            {{ __('Dashboard') }}
        </x-layout.header>
    </x-slot>

    <x-layout.container>

            <x-question.form>

                <x-form.textarea label="Qual sua pergunta..." name="question"/>

                <x-btn.reset>Cancel</x-btn.reset>
                <x-btn.primary>Save</x-btn.primary>

            </x-question.form>

        <hr class="border-gray-700 border-dashed my-4">

        <div class="dark:text-gray-400 uppercase font-bold">## List of questions</div>

        @foreach($questions as $question)
            <x-question.card :question="$question"/>
        @endforeach

    </x-layout.container>>
</x-app-layout>
