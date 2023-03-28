<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Border;

class WordController extends Controller
{
    //
    public function wordtest(){
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        /*
        * Note: it's possible to customize font style of the Text element you add in three ways:
        * - inline;
        * - using named font style (new font style object will be implicitly created);
        * - using explicitly created font style object.
        */

        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);


        // add a section to the document
        $section2 = $phpWord->addSection();

        // add a table to the section
        $table = $section2->addTable();

        // add the first row to the table
        $table->addRow();

        // add three cells to the first row
        $table->addCell(2000)->addText('Cell 1');
        $table->addCell(2000)->addText('Cell 2');
        $table->addCell(2000)->addText('Cell 3');

        // add the second row to the table
        $table->addRow();

        // add three cells to the second row
        $table->addCell(2000)->addText('Cell 4');
        $table->addCell(2000)->addText('Cell 5');
        $table->addCell(2000)->addText('Cell 6');

        
        // Add the table to the document
        $section->add($table);        

        $section->addTextBreak(1);
        $section->addText(htmlspecialchars('Fancy table'));

        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(900);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 1'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 2'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 3'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 4'), $fontStyle);
        $table->addCell(500, $styleCellBTLR)->addText(htmlspecialchars('Row 5'), $fontStyle);
        for ($i = 1; $i <= 8; $i++) {
            $table->addRow();
            $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
            $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
            $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
            $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
            $text = (0== $i % 2) ? 'X' : '';
            $table->addCell(500)->addText(htmlspecialchars($text));
        }

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
    }
}