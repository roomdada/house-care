@extends('panel.master')
@section('content')
 <div class="content">
     
      <!-- /.row -->
      

      <!-- /.row -->
    
      
      <div class="row">
        <div class="col-xl-12">
          <div class="info-box">
            <div class="card-header">
               <h3>Les messages</h3>
               @if(session()->has('success'))
                <div class="alert alert-success">
                  {{session()->get('success')}}
                </div>
               @endif

            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom & Prénoms</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                  <tr>
                    <td>{{$message->firstname.' '.$message->lastname}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td><button class="btn btn-danger"><a class="text-white" href="{{ route('admin.delete.message',$message->id) }}">
                      <i class="fa fa-trash"></i>
                    </a></button></td>
                  </tr>
                @endforeach

                </tbody>
               
              </table>
               <div class="float-left ml-4">
                 {{$messages->links()}}
               </div>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.row -->
      
     
      <!-- /.row --> 
    </div>
    @stop