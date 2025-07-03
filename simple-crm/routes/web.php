<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/calendar/events', function () {
    return \App\Models\Interaction::with('contact')->get()->map(function ($interaction) {
        return [
            'id' => $interaction->id,
            'title' => $interaction->contact->name . ': ' . $interaction->interaction_type,
            'start' => $interaction->date,
            'color' => match($interaction->interaction_type) {
                'call' => '#f97316',
                'email' => '#22c55e',
                'meeting' => '#3b82f6',
                'note' => '#facc15',
                'other' => '#6b7280',
            },
        ];
    });
});
