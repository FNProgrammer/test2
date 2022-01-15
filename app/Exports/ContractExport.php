<?php

namespace App\Exports;

use App\Models\Contract;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContractExport implements FromCollection,WithMapping
{
        public $contracts;
    public function __construct($contracts)
    {
        $this->contracts=$contracts;
    }

    public function collection()
    {
        return $this->contracts;
        // TODO: Implement query() method.
    }

    public function map($contract):array
    {
    return [
        $contract->employee->employee_id,
        $contract->employee->getFullName(),
        $contract->home->district,
        $contract->home->unit,
        $contract->start_date,
        $contract->end_date
        ];
    }

   // public function headings(): array
   // {
        //return[
//'name',
      // ];
    //}
}
