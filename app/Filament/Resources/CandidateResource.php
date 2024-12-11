<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidateResource\Pages;
use App\Filament\Resources\CandidateResource\RelationManagers;
use App\Models\Candidate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\GlobalSearch\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CandidateResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationBadgeTooltip = 'Semua Kandidat';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('id_candidate')
                //     ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('whatsapp')
                    ->required(),
                Forms\Components\TextInput::make('domicile')
                    ->required(),
                Forms\Components\TextInput::make('passport_number'),
                Forms\Components\DatePicker::make('birth_date')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('instagram_account')
                    ->required(),
                Forms\Components\TextInput::make('institution')
                    ->required(),
                Forms\Components\TextInput::make('study_program')
                    ->required(),
                Forms\Components\Textarea::make('organization_experience')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('program_reason')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('poster_proof')
                    ->required(),
                Forms\Components\FileUpload::make('instagram_follow_proof')
                    ->required(),
                Forms\Components\FileUpload::make('instagram_comment_proof')
                    ->required(),
                Forms\Components\FileUpload::make('whatsapp_share_proof')
                    ->required(),
                // Forms\Components\Toggle::make('is_valid'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('#')
                ->rowIndex(),
                Tables\Columns\TextColumn::make('is_valid')
                    ->label('Status')
                    ->formatStateUsing(function ($state) {
                        return match ((bool) $state) {
                            true => 'Valid',
                            false => $state === null ? 'Belum Diproses' : 'Tidak Valid',
                        };
                    })
                    ->color(function ($state) {
                        return match ((bool) $state) {
                            true => 'success',
                            false => $state === null ? 'secondary' : 'danger',
                        };
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Timestamp')
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_candidate')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->formatStateUsing(fn ($state) => '<a href="https://wa.me/' . $state . '" target="_blank" class="text-blue-500">' . $state . '</a>')
                    ->html()
                    ->searchable()
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('domicile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passport_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('instagram_account')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('institution')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('study_program')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('poster_proof')
                    ->square()
                    ->toggleable(),
                Tables\Columns\ImageColumn::make('instagram_follow_proof')
                    ->square()
                    ->toggleable(),
                Tables\Columns\ImageColumn::make('instagram_comment_proof')
                    ->square()
                    ->toggleable(),
                Tables\Columns\ImageColumn::make('whatsapp_share_proof')
                    ->square()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->groups([
                // Tables\Grouping\Group::make('is_valid')

            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('Approve')
                    ->action(fn (Candidate $record) => $record->update(['is_valid' => true]))
                    ->icon('heroicon-m-check-circle') 
                    ->color('success')
                    ->requiresConfirmation(),
                Tables\Actions\Action::make('Reject')
                    ->action(fn (Candidate $record) => $record->update(['is_valid' => false]))
                    ->icon('heroicon-m-x-circle') // Ikon untuk Tolak
        ->color('danger')
                    ->requiresConfirmation(),
            ]);
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);
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
            'index' => Pages\ListCandidates::route('/'),
            'create' => Pages\CreateCandidate::route('/create'),
            'edit' => Pages\EditCandidate::route('/{record}/edit'),
        ];
    }
}
