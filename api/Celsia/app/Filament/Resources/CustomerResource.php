<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(20),
                TextInput::make('last_name')->required(),
                DatePicker::make('date_of_birth')->required(),
                TextInput::make('phone')->required(),
                Select::make('identification_option_id')
                ->relationship('identificationOption', 'name')
                ->required()->label('Identification type'),
                TextInput::make('identification_number')->required(),
                TextInput::make('email')->required()->email(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('name')
                ->sortable()
                ->searchable(),
            TextColumn::make('last_name')
                ->sortable()
                ->searchable(),
            TextColumn::make('date_of_birth')
                ->sortable()
                ->searchable(),
            TextColumn::make('phone')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('identificationOption.name')
                ->label('Identification type')
                ->sortable()
                ->searchable(),
            TextColumn::make('identification_number')
                ->sortable()
                ->searchable(),
            TextColumn::make('email')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
