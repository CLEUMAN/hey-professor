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

    </x-layout.container>>
</x-app-layout>
