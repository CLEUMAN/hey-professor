<?php

it('should be able to create a new question bigger than 255 characters', function(){
    //AAA
    // ARRANGE:: PREPARAR
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);


    //  ACT:: AGIR
    $request = \Pest\Laravel\post(route('question.store'), [
        'question' => str_repeat('*', 260).'?',

    ]);


    // ASSERT:: VERIFICAR
    $request->assertRedirect();
    \Pest\Laravel\assertDatabaseCount('questions', 1);
    \Pest\Laravel\assertDatabaseHas('questions', ['question' => str_repeat('*', 260).'?']);
});

it('should create as a draft all the time', function(){
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);

    $request = \Pest\Laravel\post(route('question.store'), [
        'question' => str_repeat('*', 260).'?',

    ]);


    \Pest\Laravel\assertDatabaseHas('questions',
        ['question' => str_repeat('*', 260).'?',
        'draft' => true]);
});

it('should check if ends with question mark ?', function(){
    // ARRANGE:: PREPARAR
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);

    //  ACT:: AGIR
    $request = \Pest\Laravel\post(route('question.store'), [
        'question' => str_repeat('*', 10),

    ]);


    // ASSERT:: VERIFICAR
    $request->assertSessionHasErrors([
        'question' => 'Are you sure that is a question ? It is missing the question mark in the end'
    ]);
    \Pest\Laravel\assertDatabaseCount('questions', 0);
});

it('should have at least 10 characters', function(){
    // ARRANGE:: PREPARAR
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);

    //  ACT:: AGIR
    $request = \Pest\Laravel\post(route('question.store'), [
        'question' => str_repeat('*', 8)."?",

    ]);


    // ASSERT:: VERIFICAR
    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    \Pest\Laravel\assertDatabaseCount('questions', 0);


});

    it('only authenticated users can create a new question', function (){
        \Pest\Laravel\post(route('question.store'), [
            'question' => str_repeat('*', 8). '?',
        ])->assertRedirect(route('login'));
    });
