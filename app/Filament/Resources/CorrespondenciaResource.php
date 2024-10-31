<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CorrespondenciaResource\Pages;
use App\Filament\Resources\CorrespondenciaResource\RelationManagers;
use App\Models\Correspondencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;


class CorrespondenciaResource extends Resource
{
    protected static ?string $model = Correspondencia::class;
    protected static ?string $navigationLabel = "Correspondencia";
    protected static ?string $navigationGroup = 'Oficios';
    protected static ?string $navigationIcon = 'heroicon-o-folder-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Registro de Correspondencia')
                    ->columns(3)
                    ->schema([
                //         // ...
                        Forms\Components\TextInput::make('folio_entrada')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('elabora')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('estatus_oficio')
                            ->options([
                                'ACTIVO' => 'ACTIVO',
                                'EN TRAMITE' => 'EN TRAMITE',
                                'ATENDIDO' => 'ATENDIDO',
                            ])
                            ->required(),
                        Forms\Components\DatePicker::make('fecha_elaboracion')
                            ->native(false)
                            ->firstDayOfWeek(7)
                            ->required(),
                        Forms\Components\DateTimePicker::make('fecha_recepcion')
                            ->seconds(false)
                            ->required(),
                        Forms\Components\Textarea::make('asunto')
                            ->autosize()
                            ->required(),
                        Forms\Components\TextInput::make('firma')
                            ->label('Remitente')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('dependencia')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('dirigido_a')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cargo')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('tipo_oficio')
                            ->options([
                                'TECNICO' => 'TECNICO',
                                'CREDENCIALES' => 'CREDENCIALES',
                                'SERMICH' => 'SERMICH',
                                'PESQUISAS' => 'PESQUISAS',
                                'OTROS' => 'OTROS',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('oficio_procedencia')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('turnado_a')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('recibe')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('observaciones')
                            ->autosize()
                            ->required(),
                        Forms\Components\Checkbox::make('es_dirigido'),
                        Forms\Components\Checkbox::make('con_copia'),
                        Forms\Components\Checkbox::make('girado_delegacion'),
                        Forms\Components\FileUpload::make('archivo')
                            ->acceptedFileTypes(['pdf'])
                            ->directory('pdfs')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['application/pdf'])
                            ->panelLayout('grid')
                            ->downloadable(),
                            //->deletable(false),
                        Forms\Components\Hidden::make('estatus')
                            ->default('1'),
                    ])   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('folio_entrada')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estatus_oficio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_recepcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asunto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('firma')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dirigido_a')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_oficio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('oficio_procedencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('turnado_a')
                    ->searchable(),
                Tables\Columns\TextColumn::make('archivo'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCorrespondencias::route('/'),
            'create' => Pages\CreateCorrespondencia::route('/create'),
            'edit' => Pages\EditCorrespondencia::route('/{record}/edit'),
        ];
    }
}
