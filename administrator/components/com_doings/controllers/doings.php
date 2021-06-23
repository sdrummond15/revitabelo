<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');
jimport('phpexcel.library.PHPExcel');

class DoingsControlLerDoings extends JControllerAdmin
{
   
    public function __construct($config = array())
	{
		parent::__construct($config);
	}

    public function getModel($name='Doing', $prefix = 'DoingsModel', $config = array('ignore_request'=>true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }

    public function listaEvento(){

        $id = JRequest::getInt('id');
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('d.name AS evento, ds.*');
        $query->from('#__doings AS d');
        $query->join('', '#__doing_subscribe AS ds ON d.id = ds.id_doing');
        $query->where('ds.published = 1');
        $query->where('ds.id_doing = ' . $id);

        function conveteData($data)
        {
            if ($data == '0000-00-00')
                return '--';
            else
                return date('d/m/Y', strtotime($data));
        }

        $db->setQuery($query);
        $results = $db->loadObjectList();
        $nameDoc = 'lista_inscritos__' . str_replace('-', '_', JFilterOutput::stringURLSafe($results[0]->evento));


        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("AMDA - Associação Mineira de Defesa do Ambiente")
            ->setLastModifiedBy("AMDA - Associação Mineira de Defesa do Ambiente")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Lista de Inscritos no evento " . $results[0]->evento)
            ->setKeywords(str_replace('-', ' ', JFilterOutput::stringURLSafe($results[0]->evento)))
            ->setCategory($results[0]->evento);

        //Mesclando
        $objPHPExcel->getActiveSheet()->mergeCells('A1:O1');
        //Alinhando ao centro
        $objPHPExcel->getActiveSheet()->getStyle('A1:O2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Aumentando Fonte
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true)->setSize(16);
        //Colocando Bordas
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        //Cor de Fundo
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0E4B65');
        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('87868a');

        //Cor do Texto
        $objPHPExcel->getActiveSheet()->getStyle('A1:O2')->applyFromArray(array('font' => array('color' => array('rgb' => 'FFFFFF'))));

        //Colocando em negrito
        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getFont()->setBold(true);
        //Redimensionando
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);


        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Lista de Inscritos (' . $results[0]->evento . ')')
            ->setCellValue('A2', 'Nome')
            ->setCellValue('B2', 'E-mail')
            ->setCellValue('C2', 'Telefone')
            ->setCellValue('D2', 'CPF')
            ->setCellValue('E2', 'Identidade(RG)')
            ->setCellValue('F2', 'Data de Nascimento')
            ->setCellValue('G2', 'Sexo')
            ->setCellValue('H2', 'Escolaridade')
            ->setCellValue('I2', 'Endereço')
            ->setCellValue('J2', 'Número')
            ->setCellValue('K2', 'Complemento')
            ->setCellValue('L2', 'Bairro')
            ->setCellValue('M2', 'Cidade')
            ->setCellValue('N2', 'Estado')
            ->setCellValue('O2', 'CEP');

        $count = 1;
        $line = 3;
        foreach ($results as $inscrito) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $line, $inscrito->name)
                ->setCellValue('B' . $line, $inscrito->email)
                ->setCellValue('C' . $line, $inscrito->phone)
                ->setCellValue('D' . $line, $inscrito->cpf)
                ->setCellValue('E' . $line, $inscrito->rg)
                ->setCellValue('F' . $line, conveteData($inscrito->date_birth))
                ->setCellValue('G' . $line, $inscrito->gender)
                ->setCellValue('H' . $line, $inscrito->schooling)
                ->setCellValue('I' . $line, $inscrito->address)
                ->setCellValue('J' . $line, $inscrito->number)
                ->setCellValue('K' . $line, $inscrito->complement)
                ->setCellValue('L' . $line, $inscrito->district)
                ->setCellValue('M' . $line, $inscrito->city)
                ->setCellValue('N' . $line, $inscrito->state)
                ->setCellValue('O' . $line, $inscrito->postal_code);

            $objPHPExcel->getActiveSheet()->getStyle('A'.$line.':O'.$line)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$line.':O'.$line)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$line.':O'.$line)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$line.':O'.$line)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

            if($count%2 == 0){
                $objPHPExcel->getActiveSheet()->getStyle('A'.$line.':O'.$line)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('edeef0');
            }

            $line++;
            $count++;
        }


        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Lista de Inscritos');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nameDoc . '.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;

        return true;
    }
}