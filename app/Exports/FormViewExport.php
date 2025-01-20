<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class FormViewExport implements FromView //
{

    public $theads;
    public $row;
    public $type;
   
    public function __construct($row)
    {
        $this->theads = $row[0];
        $this->row = $row[1];
        $this->type = $row[2] ?? '';
    }

//    public function afterSheet(AfterSheet $event)
//    {
//        $sheet = $event->sheet->getDelegate();
//        $rows = $this->row;
//        foreach ($rows as $key=>$row) {
//            if(isset($row->l_status) && $row->l_status=='D'){
//                $sheet->getStyle('A'.($key+2).':N'.($key+2))->getFill()
//                    ->setFillType(Fill::FILL_SOLID)
//                    ->getStartColor()->setARGB('FFFFC0CB');
//            }
//        }
//    }

//    public function bindValue(Cell $cell, $value)
//    {
//        if($this->type == 'visa-list')
//        {
//            $stringColumns = ['I']; // numeric columns to be cast as string value
//            if (in_array($cell->getColumn(), $stringColumns))
//            {
//                dd($value);
//                $cell->setValueExplicit($value, DataType::TYPE_STRING);
//                return true;
//            }
//        }
//
//        return parent::bindValue($cell, $value);
//    }
//
//    public function drawings()
//    {
//        if($this->type == 'report' )
//        {
//            $drawing = new Drawing();
//            $drawing->setPath(public_path('storage/excel_image/'.$this->theads['image'][0]));
//            $drawing->setCoordinates('A'.(count($this->row)+3));
//            return $drawing;
//        }
//        return [];
//    }
    
    public function view(): View
    {
        if($this->type == 'visa-list'){
            return view('admin.exports.visa-list-table-export')->with('theads', $this->theads)->with('rows', $this->row);
        }

    }
}