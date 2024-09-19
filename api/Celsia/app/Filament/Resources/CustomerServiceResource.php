<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerServiceResource\Pages;
use App\Filament\Resources\CustomerServiceResource\RelationManagers;
use App\Models\CustomerService;
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

class CustomerServiceResource extends Resource
{
    protected static ?string $model = CustomerService::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('last_pay')->required(),
                DatePicker::make('initial_date')->required(),
                DatePicker::make('last_billing')->required(),
                Select::make('service_option_id')
                ->relationship('serviceOption', 'name')
                ->required(),
                Select::make('customer_id')
                ->relationship('customer', 'name')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('initial_date')
                ->sortable()
                ->searchable(),
                TextColumn::make('last_billing')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('last_pay')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('customer')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('serviceOption.name')
                    ->label('service_option')
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
            'index' => Pages\ListCustomerServices::route('/'),
            'create' => Pages\CreateCustomerService::route('/create'),
            'edit' => Pages\EditCustomerService::route('/{record}/edit'),
        ];
    }
}
