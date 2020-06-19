<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;


class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return ["ID", "Name", "Email", "Role"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },
        ];
    }

    public function map($row): array{
        $fields = [
           $row->id,
           $row->name,
           $row->email,
           $row->role,
      ];
     return $fields;
 }
}
