<?php

namespace App\Http\Controllers;

use App\Models\Imc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\imcTest;
use App\Models\partesCuerpoTest;
use App\Models\recomendacionEnTest;
use App\Models\sintomasTest;
use App\Models\Medicamento;
use App\Models\ParteCuerpo;
use App\Models\Recomendacion;
use App\Models\Sintoma;

class testController extends Controller
{

    public function index()
    {
        return view('testm.indextest.Terminos');

    }


    public function create()
    {

    }




    public function store(Request $request)

    {


        $medicines = Medicamento::all();
        $par= ParteCuerpo::all();
        $partes=$request->get('partc');
        $parte = ParteCuerpo::where('nombreParte','=',$partes)->first();
        $nsintoma=$request->get('nsintoma');
        $sintoma1=$request->get('sintoma1');
        $sintoma2=$request->get('sintoma2');
        $sintoma3=$request->get('sintoma3');
        $Csintomas=Sintoma::all();
        $sinto1 = Sintoma::where('nombreSintoma','=',$sintoma1)->first();
        $sinto2 = Sintoma::where('nombreSintoma','=',$sintoma2)->first();
        $sinto3 = Sintoma::where('nombreSintoma','=',$sintoma3)->first();
        $edades=$request->get('edad');
        $intensidad=$request->get('intensidad');
        $estatura=$request->get('estatura');
        $peso=$request->get('peso');
         //return dd($imcs);

if($parte!==null)
{
    if($partes==$parte->nombreParte)
    {
    //////numero de sintomas inicio//////
        if($nsintoma == 1 )
        {
            //////sintoma inicio//////
            if($sinto1!==null & $intensidad!==null)
            {
                if($sintoma1==$sinto1->nombreSintoma)
                {



                      // return dd($intensidadmax->intensidadMax);
                           if($edades!==null)
                            {
                           $edadmin=Recomendacion::join('parte_cuerpos AS pc','pc.id','=','recomendacions.parte_id')
                           ->join('recomendacion_sintoma AS sr','sr.recomendacion_id','=','recomendacions.id')
                           ->join('sintomas AS s','s.id','=','sr.sintoma_id')
                           ->where('pc.nombreParte','=',$partes)
                           ->where('s.nombreSintoma','=',$sintoma1)
                           ->orderBy('edadMin','DESC')->first();
                            $edadmax=Recomendacion::join('parte_cuerpos AS pc','pc.id','=','recomendacions.parte_id')
                            ->join('recomendacion_sintoma AS sr','sr.recomendacion_id','=','recomendacions.id')
                            ->join('sintomas AS s','s.id','=','sr.sintoma_id')
                            ->where('pc.nombreParte','=',$partes)
                            ->where('s.nombreSintoma','=',$sintoma1)
                            ->orderBy('edadMax','DESC')->first();




                            $estaturas=$estatura*$estatura;
                            $imc=$peso/$estaturas;



                            if($imc!==null)
                           {

                            $imcMin = Imc::where('imcMin','<=',$imc)->orderBy('imcMin','DESC')->first();
                            $imcMax = Imc::where('imcMax','>=',$imc)->orderBy('imcMax','ASC')->first();

                                   $nsintoma=$nsintoma;
                                   $estatura=$estatura;
                                   $peso=$peso;
                                   $imcmin=$imcMin->imcMin;
                                   $imcmax=$imcMax->imcMax;
                                   $intensidad=$intensidad;
                                   $edadmin=$edadmin->edadMin;
                                   $edadmax=$edadmax->edadMax;
                                   $partes=$partes;
                                   $sintoma1=$sintoma1;



                                    $enfermedad=DB::select(
                                       'SELECT
                                       r.nombreRecomendacion,
                                       r.dosis,
                                       r.frecuencia,
                                       r.tiempo,
                                       r.informacionAdicional,
                                       m.nombreMedicamento,
                                       s.nombreSintoma,
                                       im.nombreImc,
                                       im.imcMin,
                                       im.imcMax,
                                       pc.nombreParte,
                                       r.status,
                                       m.imagen
                                       FROM recomendacions r
                                       JOIN parte_cuerpos pc
                                       ON pc.id=r.parte_id

                                       JOIN recomendacion_sintoma sr
                                       ON sr.recomendacion_id=r.id

                                       JOIN sintomas s
                                       ON s.id=sr.sintoma_id

                                       JOIN medicamento_recomendacion mr
                                       ON mr.recomendacion_id=r.id

                                       JOIN medicamentos m
                                       ON m.id=mr.medicamento_id
                                       JOIN imcs im
                                       ON im.id=r.imc_id

                                       where im.imcMin=?
                                       AND im.imcMax=?
                                       AND r.edadMin BETWEEN ? AND ? AND r.edadMax <=?
                                       AND r.intensidad = ?
                                       AND pc.nombreParte=?
                                       AND s.nombreSintoma=?',
                                       [$imcmin,$imcmax,$edadmin,$edades,$edadmax,$intensidad,$partes,$sintoma1]

                                      );

                                      if($enfermedad==[])
                                      {
                                        return view('testm.indextest.noExiste')->with('partes',$partes)
                                        ->with('sintoma1',$sintoma1)
                                        ->with('imc',$imc)
                                        ->with('edades',$edades)
                                        ->with('intensidad',$intensidad)
                                        ->with('nsintoma',$nsintoma)
                                        ->with('estatura',$estatura)
                                        ->with('peso',$peso);

                                       }else
                                       {

                                       return view('testm.recomendaciones.1recomendacion', compact('medicines'))
                                        ->with('enfermedades',$enfermedad)
                                        ->with('imc',$imc)
                                        ->with('edades',$edades)
                                        ->with('intensidad',$intensidad)
                                        ->with('nsintoma',$nsintoma)
                                        ->with('estatura',$estatura)
                                        ->with('peso',$peso);
                                        }


                           }else{
                            $intensidad=$intensidad;
                            $sintoma1=$sintoma1;
                            $nsintoma=$nsintoma;
                            $partes=$partes;
                            return view('testm.edades.personai')
                            ->with('partes',$partes)
                            ->with('nsintoma',$nsintoma)
                            ->with('sintoma1',$sintoma1)
                            ->with('intensidades',$intensidad);
                            }


                        }else
                        {
                        $intensidad=$intensidad;
                        $sintoma1=$sintoma1;
                        $nsintoma=$nsintoma;
                        $partes=$partes;
                        return view('testm.edades.personai')
                        ->with('partes',$partes)
                        ->with('nsintoma',$nsintoma)
                        ->with('sintoma1',$sintoma1)
                        ->with('intensidades',$intensidad);
                        }
                }
        ////////edades fin///
            }else
            {
             $nsintoma=$nsintoma;
              $partes=$partes;
               return view('testm.sintomas.1sintoma', compact('Csintomas'))
               ->with('partes',$partes)
               ->with('nsintoma',$nsintoma);
            }
            ////////sintomas fin///
        }else if($nsintoma == 2 )
        {

            //////sintoma inicio//////
            if($sinto1!==null &  $sinto2!==null & $intensidad!==null)
            {
                if($sintoma1==$sinto1->nombreSintoma )
                { if($sintoma2==$sinto2->nombreSintoma )
                    {



                      // return dd($intensidadmin->intensidadMin);

                           if($edades!==null)
                            {


                           $edadmin=Recomendacion::join('parte_cuerpos AS pc','pc.id','=','recomendacions.parte_id')
                           ->join('recomendacion_sintoma AS sr','sr.recomendacion_id','=','recomendacions.id')
                           ->join('recomendacion_sintoma AS srr','srr.recomendacion_id','=','recomendacions.id')
                           ->join('sintomas AS s','s.id','=','sr.sintoma_id')
                           ->join('sintomas AS ss','ss.id','=','srr.sintoma_id')
                           ->where('pc.nombreParte','=',$partes)
                           ->where('s.nombreSintoma','=',$sintoma1)
                           ->where('ss.nombreSintoma','=',$sintoma2)
                           ->orderBy('edadMin','DESC')->first();
                            $edadmax=Recomendacion::join('parte_cuerpos AS pc','pc.id','=','recomendacions.parte_id')
                            ->join('recomendacion_sintoma AS sr','sr.recomendacion_id','=','recomendacions.id')
                            ->join('recomendacion_sintoma AS srr','srr.recomendacion_id','=','recomendacions.id')
                            ->join('sintomas AS s','s.id','=','sr.sintoma_id')
                            ->join('sintomas AS ss','ss.id','=','srr.sintoma_id')
                            ->where('pc.nombreParte','=',$partes)
                            ->where('s.nombreSintoma','=',$sintoma1)
                            ->where('ss.nombreSintoma','=',$sintoma2)
                            ->orderBy('edadMin','DESC')->first();
                            $estaturas=$estatura*$estatura;
                            $imc=$peso/$estaturas;
                            if($imc!==null)
                           {
                            $imcMin = Imc::where('imcMin','<=',$imc)->orderBy('imcMin','DESC')->first();
                            $imcMax = Imc::where('imcMax','>=',$imc)->orderBy('imcMax','ASC')->first();
                            $nsintoma=$nsintoma;
                            $estatura=$estatura;
                            $peso=$peso;
                            $imcmin=$imcMin->imcMin;
                            $imcmax=$imcMax->imcMax;
                            $intensidad=$intensidad;
                            $edadmin=$edadmin->edadMin;
                            $edadmax=$edadmax->edadMax;
                            $partes=$partes;
                            $sintoma1=$sintoma1;
                                   $sintoma2=$sintoma2;

                                   $enfermedad=DB::select(
                                       'SELECT
                                       r.nombreRecomendacion,
                                       r.dosis,
                                       r.frecuencia,
                                       r.tiempo,
                                       r.informacionAdicional,
                                       m.nombreMedicamento,
                                       s.nombreSintoma,
                                       ss.nombreSintoma,
                                       im.nombreImc,
                                       im.imcMin,
                                       im.imcMax,
                                       pc.nombreParte,
                                       r.estado,
                                       m.imagen
                                       FROM recomendacions r
                                       JOIN parte_cuerpos pc
                                       ON pc.id=r.parte_id

                                       JOIN recomendacion_sintoma sr
                                       ON sr.recomendacion_id=r.id

                                       JOIN recomendacion_sintoma srr
                                       ON srr.recomendacion_id=r.id

                                       JOIN sintomas s
                                       ON s.id=sr.sintoma_id

                                       JOIN sintomas ss
                                       ON ss.id=srr.sintoma_id

                                       JOIN medicamento_recomendacion mr
                                       ON mr.recomendacion_id=r.id

                                       JOIN medicamentos m
                                       ON m.id=mr.medicamento_id
                                       JOIN imcs im
                                       ON im.id=r.imc_id

                                       where im.imcMin=?
                                       AND im.imcMax=?
                                       AND r.edadMin BETWEEN ? AND ? AND r.edadMax <=?
                                       AND r.intensidad = ?
                                       AND pc.nombreParte=?
                                       AND ss.nombreSintoma=?
                                       AND s.nombreSintoma=?',
                                       [$imcmin,$imcmax,$edadmin,$edades,$edadmax,$intensidad,$partes,$sintoma1,$sintoma2]

                                      );
                                      if($enfermedad==[])
                                      {
                                        return view('testm.indextest.noExiste')->with('partes',$partes)
                                        ->with('sintoma1',$sintoma1)
                                        ->with('imc',$imc)
                                        ->with('edades',$edades)
                                        ->with('intensidad',$intensidad)
                                        ->with('nsintoma',$nsintoma)
                                        ->with('estatura',$estatura)
                                        ->with('peso',$peso);
                                       }else
                                       {
                                       return view('testm.recomendaciones.2recomendacion', compact('medicines'))
                                        ->with('enfermedades',$enfermedad)
                                        ->with('imc',$imc)
                                        ->with('edades',$edades)
                                        ->with('intensidad',$intensidad)
                                        ->with('nsintoma',$nsintoma)
                                        ->with('estatura',$estatura)
                                        ->with('peso',$peso);
                                        }




                           }else{
                            $intensidad=$intensidad;
                            $sintoma1=$sintoma1;
                            $sintoma2=$sintoma2;
                            $nsintoma=$nsintoma;
                            $partes=$partes;
                            return view('testm.edades.personai2')
                            ->with('partes',$partes)
                            ->with('nsintoma',$nsintoma)
                            ->with('sintoma1',$sintoma1)
                            ->with('sintoma2',$sintoma2)
                            ->with('intensidades',$intensidad);
                            }


                        }else
                        {
                        $intensidad=$intensidad;
                        $sintoma1=$sintoma1;
                        $sintoma2=$sintoma2;
                        $nsintoma=$nsintoma;
                        $partes=$partes;
                        return view('testm.edades.personai2')
                        ->with('partes',$partes)
                        ->with('nsintoma',$nsintoma)
                        ->with('sintoma1',$sintoma1)
                        ->with('sintoma2',$sintoma2)
                        ->with('intensidades',$intensidad);
                        }
                }
        ////////edades fin///
                    }else
                    {
                    $nsintoma=$nsintoma;
                    $partes=$partes;
                    return view('testm.sintomas.2sintoma', compact('Csintomas'))
                    ->with('partes',$partes)
                    ->with('nsintoma',$nsintoma);
                    }
            }else
            {
             $nsintoma=$nsintoma;
              $partes=$partes;
               return view('testm.sintomas.2sintoma', compact('Csintomas'))
               ->with('partes',$partes)
               ->with('nsintoma',$nsintoma);
            }
            ////////sintomas fin///
        }else if($nsintoma == 3 )
           {
            //////sintoma inicio//////
            if($sinto1!==null & $intensidad!==null)
            {
                if($sintoma1==$sinto1->nombreSintoma)
                {if($sintoma2==$sinto2->nombreSintoma){
                    if($sintoma3==$sinto3->nombreSintoma){

                       // return dd($intensidadmin->intensidadMin);

                            if($edades!==null)
                             {


                            $edadmin=Recomendacion::join('parte_cuerpos AS pc','pc.id','=','recomendacions.parte_id')
                            ->join('recomendacion_sintoma AS sr','sr.recomendacion_id','=','recomendacions.id')
                            ->join('recomendacion_sintoma AS srr','srr.recomendacion_id','=','recomendacions.id')
                            ->join('recomendacion_sintoma AS srrr','srr.recomendacion_id','=','recomendacions.id')
                            ->join('sintomas AS s','s.id','=','sr.sintoma_id')
                            ->join('sintomas AS ss','ss.id','=','srr.sintoma_id')
                            ->join('sintomas AS sss','sss.id','=','srrr.sintoma_id')
                            ->where('pc.nombreParte','=',$partes)
                            ->where('s.nombreSintoma','=',$sintoma1)
                            ->where('ss.nombreSintoma','=',$sintoma2)
                            ->where('sss.nombreSintoma','=',$sintoma3)
                            ->orderBy('edadMin','DESC')->first();
                             $edadmax=Recomendacion::join('parte_cuerpos AS pc','pc.id','=','recomendacions.parte_id')
                             ->join('recomendacion_sintoma AS sr','sr.recomendacion_id','=','recomendacions.id')
                             ->join('recomendacion_sintoma AS srr','srr.recomendacion_id','=','recomendacions.id')
                             ->join('recomendacion_sintoma AS srrr','srr.recomendacion_id','=','recomendacions.id')
                             ->join('sintomas AS s','s.id','=','sr.sintoma_id')
                             ->join('sintomas AS ss','ss.id','=','srr.sintoma_id')
                             ->join('sintomas AS sss','sss.id','=','srrr.sintoma_id')
                             ->where('pc.nombreParte','=',$partes)
                             ->where('s.nombreSintoma','=',$sintoma1)
                             ->where('ss.nombreSintoma','=',$sintoma2)
                             ->where('sss.nombreSintoma','=',$sintoma3)
                             ->orderBy('edadMin','DESC')->first();
                             $estaturas=$estatura*$estatura;
                             $imc=$peso/$estaturas;
                             if($imc!==null)
                            {
                            $imcMin = Imc::where('imcMin','<=',$imc)->orderBy('imcMin','DESC')->first();
                            $imcMax = Imc::where('imcMax','>=',$imc)->orderBy('imcMax','ASC')->first();
                                   $nsintoma=$nsintoma;
                                   $estatura=$estatura;
                                   $peso=$peso;
                                   $imcmin=$imcMin->imcMin;
                                   $imcmax=$imcMax->imcMax;
                                   $intensidad=$intensidad;
                                   $edadmin=$edadmin->edadMin;
                                   $edadmax=$edadmax->edadMax;
                                   $partes=$partes;
                                   $sintoma1=$sintoma1;
                                   $sintoma2=$sintoma2;
                                   $sintoma3=$sintoma3;

                                    $enfermedad=DB::select(
                                        'SELECT
                                        r.nombreRecomendacion,
                                       r.dosis,
                                       r.frecuencia,
                                       r.tiempo,
                                       r.informacionAdicional,
                                       m.nombreMedicamento,
                                       s.nombreSintoma,
                                       ss.nombreSintoma,
                                       sss.nombreSintoma,
                                       im.nombreImc,
                                       im.imcMin,
                                       im.imcMax,
                                       pc.nombreParte,
                                       r.estado,
                                       m.imagen
                                        FROM recomendacions r
                                        JOIN parte_cuerpos pc
                                        ON pc.id=r.parte_id

                                        JOIN recomendacion_sintoma sr
                                        ON sr.recomendacion_id=r.id

                                        JOIN recomendacion_sintoma srr
                                        ON srr.recomendacion_id=r.id

                                        JOIN recomendacion_sintoma srrr
                                        ON srrr.recomendacion_id=r.id

                                        JOIN sintomas s
                                        ON s.id=sr.sintoma_id

                                        JOIN sintomas ss
                                        ON ss.id=srr.sintoma_id

                                        JOIN sintomas sss
                                        ON sss.id=srrr.sintoma_id

                                        JOIN medicamento_recomendacion mr
                                        ON mr.recomendacion_id=r.id

                                        JOIN medicamentos m
                                        ON m.id=mr.medicamento_id
                                        JOIN imcs im
                                        ON im.id=r.imc_id

                                        where im.imcMin=?
                                        AND im.imcMax=?
                                        AND r.edadMin BETWEEN ? AND ? AND r.edadMax <=?
                                        AND r.intensidad = ?
                                        AND pc.nombreParte=?
                                        AND s.nombreSintoma=?
                                        AND ss.nombreSintoma=?
                                        AND sss.nombreSintoma=?',
                                        [$imcmin,$imcmax,$edadmin,$edades,$edadmax,$intensidad,$partes,$sintoma1,$sintoma2,$sintoma3]

                                       );
                                       if($enfermedad==[])
                                       {
                                        return view('testm.indextest.noExiste')->with('partes',$partes)
                                        ->with('sintoma1',$sintoma1)
                                        ->with('imc',$imc)
                                        ->with('edades',$edades)
                                        ->with('intensidad',$intensidad)
                                        ->with('nsintoma',$nsintoma)
                                        ->with('estatura',$estatura)
                                        ->with('peso',$peso);
                                        }else
                                        {
                                        return view('testm.recomendaciones.3recomendacion', compact('medicines'))
                                         ->with('enfermedades',$enfermedad)
                                         ->with('imc',$imc)
                                         ->with('edades',$edades)
                                         ->with('intensidad',$intensidad)
                                         ->with('nsintoma',$nsintoma)
                                         ->with('estatura',$estatura)
                                         ->with('peso',$peso);
                                         }


                            }else
                            {
                                $intensidad=$intensidad;
                                $sintoma1=$sintoma1;
                                $sintoma2=$sintoma2;
                                $sintoma3=$sintoma3;
                                $nsintoma=$nsintoma;
                                $partes=$partes;
                            return view('testm.edades.personai3')
                            ->with('partes',$partes)
                            ->with('nsintoma',$nsintoma)
                            ->with('sintoma1',$sintoma1)
                            ->with('sintoma2',$sintoma2)
                            ->with('sintoma3',$sintoma3)
                            ->with('intensidades',$intensidad);
                            }


                         }else
                         {
                         $intensidad=$intensidad;
                         $sintoma1=$sintoma1;
                         $sintoma2=$sintoma2;
                         $sintoma3=$sintoma3;
                         $nsintoma=$nsintoma;
                         $partes=$partes;
                         return view('testm.edades.personai3')
                         ->with('partes',$partes)
                         ->with('nsintoma',$nsintoma)
                         ->with('sintoma1',$sintoma1)
                         ->with('sintoma2',$sintoma2)
                         ->with('sintoma3',$sintoma3)
                         ->with('intensidades',$intensidad);
                         }


                    }else
                    {
                     $nsintoma=$nsintoma;
                      $partes=$partes;
                       return view('testm.sintomas.3sintoma', compact('Csintomas'))
                       ->with('partes',$partes)
                       ->with('nsintoma',$nsintoma);
                    }
                }else
                {
                 $nsintoma=$nsintoma;
                  $partes=$partes;
                   return view('testm.sintomas.3sintoma', compact('Csintomas'))
                   ->with('partes',$partes)
                   ->with('nsintoma',$nsintoma);
                }
            }else
            {
             $nsintoma=$nsintoma;
              $partes=$partes;
               return view('testm.sintomas.3sintoma', compact('Csintomas'))
               ->with('partes',$partes)
               ->with('nsintoma',$nsintoma);
            }
        ////////edades fin///
            }else
            {
             $nsintoma=$nsintoma;
              $partes=$partes;
               return view('testm.sintomas.3sintoma', compact('Csintomas'))
               ->with('partes',$partes)
               ->with('nsintoma',$nsintoma);
            }
            ////////sintomas fin///
        }else
        {
        $partes=$partes;
        return view('testm.sintomas.NoSintomas')
        ->with('partes',$partes);
        }
        ////////numero de sintomas fin///

    }else
    {
    return view('testm.indextest.PRparteCuerpo')->with('par',$par);
    }
}
else
{
    return view('testm.indextest.PRparteCuerpo')->with('par',$par);
}
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $IdParte
     * @return \Illuminate\Http\Response
     */
    public function edit($IdParte)
    {
        /*$partecuerpo=partecuerpos::find($IdParte);
        return view('partecuerpo.edit')->with('partecuerpo',$partecuerpo);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $IdParte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdParte)
    {
       /* $partecuerpo=partecuerpos::find($IdParte);
        $partecuerpo->NombreParte=$request->get('Parte');
        $partecuerpo->save();
        return redirect('/partcuerpos');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $IdParte
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdParte)
    {
       /* $partes=partecuerpos::find($IdParte);
        $partes->delete();
        return redirect('/partcuerpos');*/

    }
}
