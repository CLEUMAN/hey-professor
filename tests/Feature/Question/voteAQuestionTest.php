<?php

it('should be able to like a question', function(){

    $user = \App\Models\User::factory()->create();

    $question = \App\Models\Question::factory()->create();

    \Pest\Laravel\actingAs($user);

    \Pest\Laravel\post(route('question.like', $question))->assertRedirect();

    \Pest\Laravel\assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'like' => 1,
        'unlike' => 0,
        'user_id' => $user->id
    ]);
});


it('should not be able to like more than 1 time', function(){

    $user = \App\Models\User::factory()->create();

    $question = \App\Models\Question::factory()->create();

    \Pest\Laravel\actingAs($user);

    \Pest\Laravel\post(route('question.like', $question));
    \Pest\Laravel\post(route('question.like', $question));
    \Pest\Laravel\post(route('question.like', $question));
    \Pest\Laravel\post(route('question.like', $question));

    expect($user->votes()->where('question_id', '=', $question->id)->get())->toHaveCount(1);
});

// unlike

it('should be able to unlike a question', function(){

    $user = \App\Models\User::factory()->create();

    $question = \App\Models\Question::factory()->create();

    \Pest\Laravel\actingAs($user);

    \Pest\Laravel\post(route('question.unlike', $question))->assertRedirect();

    \Pest\Laravel\assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'like' => 0,
        'unlike' => 1,
        'user_id' => $user->id
    ]);
});


it('should not be able to unlike more than 1 time', function(){

    $user = \App\Models\User::factory()->create();

    $question = \App\Models\Question::factory()->create();

    \Pest\Laravel\actingAs($user);

    \Pest\Laravel\post(route('question.unlike', $question));
    \Pest\Laravel\post(route('question.unlike', $question));
    \Pest\Laravel\post(route('question.unlike', $question));
    \Pest\Laravel\post(route('question.unlike', $question));

    expect($user->votes()->where('question_id', '=', $question->id)->get())->toHaveCount(1);
});
