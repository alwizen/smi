<?php

namespace App\Filament\Resources\CandidateResource\Pages;

use App\Filament\Resources\CandidateResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCandidates extends ListRecords
{
    protected static string $resource = CandidateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua Kandidat'), // Semua data
            'pending' => Tab::make('Kandidat Pending')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereNull('is_valid');
                }),

            'valid' => Tab::make('Kandidat Valid')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('is_valid', true);
                }),
            'invalid' => Tab::make('Kandidat Tidak Valid')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('is_valid', false);
                }),
                   ];
    }
}
