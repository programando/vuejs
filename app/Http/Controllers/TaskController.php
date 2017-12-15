<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Incluyo Request $request como parametro del metodo para recibir por medio de get
    public function index( Request $request )
    {
        /*

        $tasks = Task::orderBy('id','DESC')->get();
        return $tasks;

        */

        // INCLUYO CAMBIOS PARA EL TEMA DE LA PAGINACION
        // cambio el formato de salida. que incluye dos programaciones
        // la que controla la paginación y la que contiene los elementos a paginar en este caso 10
        $tasks = Task::orderBy('id','ASC')->paginate(10);
        return [
                'pagination' => [
                        'total'        => $tasks->total(),
                        'current_page' => $tasks->currentPage(),
                        'per_page'     => $tasks->perPage(),
                        'last_page'    => $tasks->lastPage(),
                        'from'         => $tasks->firstItem(),
                        'to'           => $tasks->lastPage(),
                ],
                'tasks' => $tasks
        ];
    }


   /* public function index()
    {
        /*

        $tasks = Task::orderBy('id','DESC')->get();
        return $tasks;



        // INCLUYO CAMBIOS PARA EL TEMA DE LA PAGINACION
        // cambio el formato de salida. que incluye dos programaciones
        // la que controla la paginación y la que contiene los elementos a paginar en este caso 10
        $tasks = Task::orderBy('id','ASC')->paginate(4);
        return [
                'pagination' => [
                        'total'        => $tasks->total(),
                        'current_page' => $tasks->currentPage(),
                        'per_page'     => $tasks->perPage(),
                        'last_page'    => $tasks->lastPage(),
                        'from'         => $tasks->firstItem(),
                        'to'           => $tasks->lastPage(),
                ],
                'tasks' => $tasks
        ];
    }

 */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request , [
            'keep' => 'required'
        ]);

        Task::create( $request->all() );
        return ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

    public function edit($id)
    {
        $task = Task::findOrFail( $id );
        return $task;
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate( $request , [
                    'keep' => 'required'
        ]);

        Task::find( $id )->update($request->all());
        return ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail( $id );
        $task->delete();
    }
}
