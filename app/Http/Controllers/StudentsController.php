<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with([
            'students' => Students::all()
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        //
        $validate = $request-> validated();

        $students = new Students;
        $students->idstudents = $request->idstudents;
        $students->name= $request->name;
        $students->gender = $request->gender;
        $students->address= $request->address;
        $students->email =$request ->email;
        $students->phone=$request->phone;

        $students-> save();
        return redirect('students')->with('msg','Add New Students Successfully!!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        return view('students.formedit')->with([
            'idstudents' => $idstudents,
            'name' => $data->name,
            'gender' => $data->gender,
            'address' => $data->address,
            'email' => $data->email,
            'phone' => $data->phone
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $student,$idstudents)
    {
          
        $data = $student->find($idstudents);
        $data->idstudents = $request->idstudents;
        $data->name= $request->name;
        $data->gender = $request->gender;
        $data->address= $request->address;
        $data->email =$request ->email;
        $data->phone=$request->phone;

        $data->save();
        return redirect('students')->with('msg','Data dengan Nama Students ' .$data->name. ' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students,$idstudents)
    {
        $data=$students->find($idstudents);
        $data->delete();
        return redirect('students')->with('msg','Data dengan Nama Students ' .$data->name. ' berhasil dihapus');
        
    }
    public function wali(){
        return view('students.wali')->with([
            'students' => Students::all()
        ]);
    }
}
