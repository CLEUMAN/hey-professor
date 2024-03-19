<?php

it('should be able to list all question created by me', function (){

    $wrongUser = \App\Models\User::factory()->create();
    $wrongQuestions = \App\Models\Question::factory()
        ->for($wrongUser, 'createdBy')
        ->count(10)
        ->create();

    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);

    $questions = \App\Models\Question::factory()
        ->for($user, 'createdBy')
        ->count(10)
        ->create();

    $response = \Pest\Laravel\get(route('question.index'));

    // assert
    // verificar

    /** @var \App\Models\Question $q */
    foreach ($questions as $q){
        $response->assertSee($q->question);
    }

    /** @var \App\Models\Question $q */
    foreach ($wrongQuestions as $q){
        $response->assertDontSee($q->question);
    }

});
