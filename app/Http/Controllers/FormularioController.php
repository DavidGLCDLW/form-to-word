<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use APP\Models\Formulario;

class FormularioController extends Controller
{
    //
    public function create()
    {
        return view('formulario.create');
    }
    //Recoge los formularios para pasar el tipo a la vista
    public function showSelectionForm()
    {
        $formularios = Formulario::all();
        return view('formulario.select', compact('formularios'));
    }
    //Funciones para mostrar los formularios 
    public function showFormulario1()
    {
        return view('formulario.formulario1');
    }

    public function showFormulario2()
    {
        return view('formulario.formulario2');
    }

    public function showFormulario3()
    {
        return view('formulario.formulario3');
    }

    public function showFormulario4()
    {
        return view('formulario.formulario4');
    }

    public function generarWord(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'campo1' => 'required',
            'campo2' => 'required',
            // Agrega más validaciones según sea necesario
        ]);

        // Crear un nuevo documento de Word
        $phpWord = new PhpWord();

        // Agregar contenido al documento
        $section = $phpWord->addSection();
        $section->addText('Campo 1: ' . $request->campo1);
        $section->addText('Campo 2: ' . $request->campo2);
        // Agrega más contenido según sea necesario

        // Guardar el documento en un archivo temporal
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFilePath);

        // Descargar el archivo
        return response()->download($tempFilePath, 'documento.docx')->deleteFileAfterSend();
    }
}
