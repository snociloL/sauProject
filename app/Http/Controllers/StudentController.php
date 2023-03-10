<?php

namespace App\Http\Controllers;

use App\Models\Student;
// use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\V1\StudentQuery;
// use App\Http\Requests\V1\BulkController;
use App\Http\Resources\V1\StudentResource;
use App\Http\Resources\V1\StudentCollection;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new StudentQuery();
        $queryItems = $filter->transform($request);
        
        if (count($queryItems) == 0) {
            return new StudentCollection(Student::paginate());
        }else {
            return new StudentCollection(Student::where($queryItems)->paginate());
        }
            //return Student::all();
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'studyCourse' => 'required'
        ]);
        return Student::create($request->all());
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
        //return new StudentCollection($id);
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
        $student = Student::find($id);
        $student->update($request->all());
        $student;
        return response(['message' => 'Data selected has been updated!'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return response(['message' => 'Data selected has been deleted!'], 201);
    }

    /**
     * Search for a name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return new StudentCollection(Student::where('name', 'like', $name. '%')->get());
    }

        /**
     * Search for email.
     *
     * @param  str  $email
     * @return \Illuminate\Http\Response
     */
    // public function search($email)
    // {
    //     return Student::where('email', 'like', $email. '%')->get();
    // }



}
