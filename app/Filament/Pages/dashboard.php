<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use App\Models\Feedback;

class dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        // Get the earliest 'created_at' from the Feedback model
        $earliestFeedbackDate = Feedback::min('created_at') ?: now()->startOfDay();

        return $form
            ->schema([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->default($earliestFeedbackDate)  // Default to the earliest feedback date in database
                            ->maxDate(fn (Get $get) => $get('endDate') ?: now()),

                        DatePicker::make('endDate')
                            ->default(now())  // Set default to current date
                            ->minDate(fn (Get $get) => $get('startDate') ?: $earliestFeedbackDate)
                            ->maxDate(now()),
                    ])
                    ->columns(),
            ]);
    }
}
