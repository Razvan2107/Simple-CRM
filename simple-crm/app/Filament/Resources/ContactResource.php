<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('company'),
                TextInput::make('email')->email()->required(),
                TextInput::make('phone'),

                Select::make('deal_status')
                    ->label('Deal Status')
                    ->required()
                    ->options([
                        'new' => 'New',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                    ]),

                Select::make('tag')
                    ->label('Tag')
                    ->options([
                        'new_lead' => 'New Lead',
                        'inactive_client' => 'Inactive Client',
                        'high_value' => 'High-Value Customer',
                        'vip' => 'VIP Customer',
                        'potential_buyer' => 'Potential Buyer',
                        'event_attendee' => 'Event Attendee',
                        'referral_source' => 'Referral Source',
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('company'),
                TextColumn::make('deal_status')->label('Status')->badge(),
                TextColumn::make('tag')->label('Tag')->badge(),
            ])
            ->filters([
                SelectFilter::make('deal_status')
                    ->options([
                        'new' => 'New',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                    ]),
                SelectFilter::make('tag')
                    ->options([
                        'new_lead' => 'New Lead',
                        'inactive_client' => 'Inactive Client',
                        'high_value' => 'High-Value Customer',
                        'vip' => 'VIP Customer',
                        'potential_buyer' => 'Potential Buyer',
                        'event_attendee' => 'Event Attendee',
                        'referral_source' => 'Referral Source',
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\InteractionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
