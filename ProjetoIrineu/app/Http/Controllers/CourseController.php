<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $course = Course::all();
        return view('courses.list',compact('course'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('courses.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $course = new Course();
        $course= $course->create($request->all());

        if($course->save()) {
            return redirect()->route('courses.index')->with('success_message', 'Curso criado com sucesso!');
        } else {
            return redirect()->route('courses.create', $id)->with('error_message', 'Houve um erro ao criar o curso!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findorfail($id);
        
        return view('courses.form',['courses'=> $course]);
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findorfail($id);

        $course->update($request->all());

        if($course->save()) {
            return redirect()->route('courses.index')->with('success_message', 'Curso alterado com sucesso!');
        } else {
            return redirect()->route('courses.edit', $id)->with('error_message', 'Houve um erro ao alterar o curso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         
        $course = Course::findorfail($id);
        
        $course->delete();

        return redirect()->route('courses.index')->with('success_message', 'Curso deletado com sucesso.');
 
     }

    public function confirmDestroy($id)
    {
        
        $course = Course::findorfail($id);
        
        return view('courses.deleteConfirm',['course'=> $course]);


    }
}
