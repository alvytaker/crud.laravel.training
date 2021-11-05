<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Illuminate\Support\Facades\Log;

use Carbon\Carbon;


class UserExport implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize, WithColumnFormatting
{

    protected $usuarios;
    private $columna_inicio;
    private $columna_termino;
    private $fila_data_inicio;
    private $fila_data_termino;
    private $rango_datos;


    public function __construct($usuarios = null)
    {
        $this->usuarios = $usuarios;

        $this->columna_inicio = 'A';
        $this->columna_termino = 'D';
        $this->fila_data_inicio = 2;

        if($usuarios == null)
        {
            $this->cantidad_data = 0;
            $this->fila_data_termino = 1 ;
        }
        else
        {
            $this->cantidad_data = count($usuarios);
        }
        $this->fila_data_termino = $this->cantidad_data + 1 ;
        $this->rango_datos = $this->columna_inicio.$this->fila_data_inicio.':'.$this->columna_termino.$this->fila_data_termino;
    }

    public function title(): string
    {
      $user = count($this->usuarios);

      if($user>=2){
        return 'Lista de Usuarios';
      }else{
        return 'Lista detalles de usuario';
      }

    /*Ejercicio como cambiar titulo segun un parametro existente en un arreglo

     $arriendo = $this->arriendo;
       
      foreach($arriendo as $li){
       $arriendos = $li;
       }
    if(property_exists($arriendos,'dias_restantes')){

       return 'Arriendos Vigentes Por Vencer';

    }else{
        
       return 'Arriendos Vigentes';
    }
    */
    }


    public function headings(): array
    {
        return [
            'ID Usuario', 
            'Nombre Usuario',
            'Email Usuario',
            'Profesion'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
                     
        ];
    }


    public function registerEvents(): array
    {

        Sheet::macro('setOrientation', function (Sheet $sheet, $orientation) {
            $sheet->getDelegate()->getPageSetup()->setOrientation($orientation);
        });

        Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
            $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });


        return [


            AfterSheet::class=> function(AfterSheet $event) {
            $event->sheet->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            $event->sheet->getProtection()->setSheet(true);
            $event->sheet->freezePane('A2', 'A2');
         // $event->sheet->insertNewRowBefore(7, 2);

            $event->sheet->styleCells($this->rango_datos,
            [
            'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                    //Set font style
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  11,
                            'bold'      =>  false,
                            'color' => ['argb' => '000000']
                            ]
                    ]
                );
            $event->sheet->getProtection()->setSheet(true);  
            $event->sheet->getProtection()->setPassword('12345'); 
            
            $event->sheet->styleCells(
                    $this->columna_inicio.'1:'.$this->columna_termino.'1',
                    [
                        //Set border Style
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '00000000']
                            ],
                            'outline' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '00000000']
                            ],

                        ],

                        //Set font style
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  11,
                            'bold'      =>  true,
                            'color' => ['argb' => 'ffffff']
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => '0007ba'
                                ]
                        ],

                    ]
                );

            },
        ];
    }



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $usuarios_ordenado = $this->usuarios->map(function ($item, $key) {
        return [
            $item->id_usuario,
            $item->nombre_usuario,
            $item->email_usuario,
            $item->nombre_profesion,
            
        ];
    });

      return $usuarios_ordenado;
    }
}
