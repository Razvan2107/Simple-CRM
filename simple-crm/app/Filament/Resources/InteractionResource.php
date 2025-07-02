<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InteractionResource\Pages;
use App\Filament\Resources\InteractionResource\RelationManagers;
use App\Models\Interaction;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class InteractionResource extends Resource
{
    protected static ?string $model = Interaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('contact_id')
                    ->label('Contact')
                    ->relationship('contact', 'name')
                    ->searchable()
                    ->required(),

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
                    ->rows(5),

                DateTimePicker::make('date')
                    ->label('Date & Time')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('contact.name')->label('Contact'),
                TextColumn::make('interaction_type')->label('Type')->badge(),
                TextColumn::make('date')->sortable(),
                TextColumn::make('content')->limit(50)->wrap(),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInteractions::route('/'),
            'create' => Pages\CreateInteraction::route('/create'),
            'edit' => Pages\EditInteraction::route('/{record}/edit'),
        ];
    }
}
