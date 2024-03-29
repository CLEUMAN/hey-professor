<?php

it('should be able to publish a question', closure: function (){

    $user = \App\Models\User::factory()->create();

    $question = \App\Models\Question::factory()->for($user, 'createdBy')->create(['draft' => true]);

    \Pest\Laravel\actingAs($user);

    \Pest\Laravel\put(route('question.publish', $question))->assertRedirect();

    $question->refresh();
    expect($question)->draft->toBeFalse();
});

it('should make sure that only the person who has created the question can publish the question', closure: function (){

    $rightUser = \App\Models\User::factory()->create();

    $wrongUser = \App\Models\User::factory()->create();

    $question = \App\Models\Question::factory()->create(['draft' => true, 'created_by' => $rightUser->id]);

    \Pest\Laravel\actingAs($wrongUser);
    \Pest\Laravel\put(route('question.publish', $question))->assertForbidden();

    \Pest\Laravel\actingAs($rightUser);
    \Pest\Laravel\put(route('question.publish', $question))->assertRedirect();

});
