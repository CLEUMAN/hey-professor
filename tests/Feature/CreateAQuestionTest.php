<?php

it('should be able to create a new question bigger than 255 characters', function(){
    //AAA
    // ARRANGE:: PREPARAR
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);


    //  ACT:: AGIR
    $request = \Pest\Laravel\post(route('question.store'), [
        'question' => str_repeat('*', 260),

    ]);


    // ASSERT:: VERIFICAR
    $request->assertRedirect(route('dashboard'));
    \Pest\Laravel\assertDatabaseCount('questions', 1);
    \Pest\Laravel\assertDatabaseHas('questions', ['question' => str_repeat('*', 260)]);


});

it('should check if ends with question mark ?', function(){
    expect(true)->toBeTrue();
});

it('shouldbhave at least 10 characters', function(){
    expect(true)->toBeTrue();
});
