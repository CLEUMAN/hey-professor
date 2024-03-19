<?php

it('should list all the question', function(){

    // arrange
    //criar perguntas

    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);
    $questions = \App\Models\Question::factory()->count(5)->create();

    \Pest\Laravel\actingAs($user);

    // action
    // acessar a rota
    $response = \Pest\Laravel\get(route('dashboard'));

    // assert
    // verificar

    /** @var \App\Models\Question $q */
    foreach ($questions as $q){
        $response->assertSee($q->question);
    }
} );
