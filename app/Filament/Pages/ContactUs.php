<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ContactUs extends Page
{

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static ?string $recordTitleAttribute = 'Category';

    protected static ?int $navigationSort = 5;
    protected string $view = 'filament.pages.contact-us';
}
