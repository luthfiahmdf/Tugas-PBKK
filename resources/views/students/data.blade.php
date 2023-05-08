@extends('layout.main')

@section('content')
<h3>DATA Students</h3>
<div class="mx-auto my-auto container card">
    <div class="card-header">
     <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">
        <i class="fas fa-plus-circle"></i> Add New Data
     </button>
    </div>
    <div class="card-body">
      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Berhasil!</strong> {{ session('msg') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    </div>
@endif
   <table class="table table-sm table-striped">
      <thead>
         <tr>
            <th>No</th>
            <th>Id Students</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
           
         </tr>
      </thead>
      <tbody>
         @foreach ($students as $row )
            <tr>
               <th>{{ $loop->iteration }}</th>
               <td>{{ $row->idstudents }}</td>
               <td>{{ $row->name }}</td>
               <td>{{ ($row->gender=="M") ? "Male":"Female"  }}</td>
               <td>{{ $row->address }}</td>
               <td>{{ $row->email }}</td>
               <td>{{ $row->phone }}</td>
               <td>
                  <button type="button" onclick="window.location='{{ url('students/'.$row->idstudents) }}'" class="btn btn-sm btn-warning">
                     <i class="fas fa-edit"></i>
                  </button>
                  <form method="POST" onsubmit="retrun deleteData('{{ $row->name }}')" style="display: inline" action="{{ url('students/'.$row->idstudents) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                     <i class="fas fa-trash-alt"></i>
                  </button>
                  </form>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
    </div>
  </div>
  <script>
   function deleteData(name){
      pesan= confirm(`Yakin Data students dengan nama ${name}ini dihapus ?`)
      if(pesan)return true;
      else return false;
   }
  </script>
  @endsection