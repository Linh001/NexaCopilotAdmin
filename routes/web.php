<?php

use App\Filament\Resources\RecruitmentNeedResource\Pages\CreateRecruitmentNeed;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::filament('/recruitment-needs/check-match/{recruitmentNeedId}', [CreateRecruitmentNeed::class, 'checkMatch'])
//     ->name('filament.recruitment-needs.check-match');