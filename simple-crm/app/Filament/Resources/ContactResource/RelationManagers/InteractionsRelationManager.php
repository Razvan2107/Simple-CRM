<?php

namespace App\Filament\Resources\ContactResource\RelationManagers;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InteractionsRelationManager extends RelationManager
{
    protected static string $relationship = 'interactions';

    protected static ?string $title = 'Interactions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('interaction_type')
                    ->label('Type')
                    ->options([
                        'meeting' => 'Meeting',
                        'call' => 'Call',
                        'email' => 'Email',
                        'note' => 'Note',
                        'other' => 'Other',
                    ])
                    ->required(),

                Textarea::make('content')
                    ->label('Content')
                    ->required()
                    ->rows(4),

                DateTimePicker::make('date')
                    ->label('Date & Time')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('interaction_type')->label('Type')->badge(),
                TextColumn::make('date')->sortable(),
                TextColumn::make('content')->limit(50)->wrap(),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getRelationshipName(): string
    {
        return 'interactions';
    }
}
