<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

trait HasFormattedDates
{
    protected function formatDate($value): ?string
    {
        return $value ? Carbon::parse($value)->format('m/d/Y') : null;
    }

    public function createdAt(): Attribute
    {
        return Attribute::get(fn($value) => $this->formatDate($value));
    }

    public function updatedAt(): Attribute
    {
        return Attribute::get(fn($value) => $this->formatDate($value));
    }

    public function deletedAt(): Attribute
    {
        return Attribute::get(fn($value) => $this->formatDate($value));
    }

    public function dueDate(): Attribute
    {
        return Attribute::get(fn($value) => $this->formatDate($value));
    }

    public function deadline(): Attribute
    {
        return Attribute::get(fn($value) => $this->formatDate($value));
    }
}
