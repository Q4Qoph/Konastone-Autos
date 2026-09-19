<?php

namespace App\Enums;

enum VehicleStatus: string
{
    case Draft = 'draft';
    case Available = 'available';
    case Reserved = 'reserved';
    case Sold = 'sold';
    case Archived = 'archived';
}
