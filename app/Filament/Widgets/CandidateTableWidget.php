<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Candidate;
use Filament\Widgets\TableWidget as BaseWidget;

class CandidateTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Kandidat Belum Divalidasi';

    protected static ?string $pollingInterval = '10s';
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';


    public function table(Table $table): Table
    {
        return $table
            ->query(
                Candidate::query()->whereNull('is_valid') // Hanya data dengan is_valid null
            )
            ->columns([
                TextColumn::make('#')
                ->rowIndex(),
                TextColumn::make('created_at')
                    ->label('Tanggal Pendaftaran')
                    ->date()
                    ->sortable(),

                TextColumn::make('id_candidate')
                    ->label('ID Kandidat')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
            ]);
        // ->actions([
        //     Tables\Actions\ViewAction::make(),
        //     Tables\Actions\Action::make('Approve')
        //         ->action(fn (Candidate $record) => $record->update(['is_valid' => true]))
        //         ->requiresConfirmation(),
        //     Tables\Actions\Action::make('Tolak')
        //         ->action(fn (Candidate $record) => $record->update(['is_valid' => false]))
        //         ->requiresConfirmation(),
        // ]);

    }
}
