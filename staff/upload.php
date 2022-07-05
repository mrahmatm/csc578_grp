<?php

//upload.php

include 'vendor/autoload.php';
//$path = $_POST["path"];
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["targetExcel"]["name"] != ''){
    $allowed_extension = array('xls', 'xlsx');
    $file_array = explode(".", $_FILES['targetExcel']['name']);
    $file_extension = end($file_array);
    if(in_array($file_extension, $allowed_extension)){
        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($_FILES['targetExcel']['tmp_name']);

        $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
        $highestColumn = $spreadsheet->getActiveSheet()->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
        for ($row = 1; $row <= $highestRow; $row++) {
            $riga = array();
            for ($col = 1; $col <= $highestColumnIndex; $col++) {
                $riga[] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow($col, $row)->getValue();
            }
            if (1 === $row) {
                // Header row. Save it in "$keys".
                $keys = $riga;
                continue;
            }
            // This is not the first row; so it is a data row.
            // Transform $riga into a dictionary and add it to $data.
            $data[] = array_combine($keys, $riga);
            $message = json_encode($data);
        }
    }else{
        $message = '0';
    }
}else{
    $message = '0';
}

echo $message;

?>