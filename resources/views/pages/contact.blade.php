@extends('layouts.master')
@section('title')
Contactez-nous
@stop
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <h5>Contact</h5>
                    <h1 class="pt-3">Vous avez des questions?</h1>
                    <p class="pt-3 pb-5">N'hesitez pas a nous contactez.</p>
                </div>
            </div>
            <div class="col-md-6">
                  <div>
          @if (session()->has('success'))
                          <div style="display: block; width: 100%; height: 50px;" class="alert alert-success flash text-center">
                             {{session()->get('success')}}
                          </div>
                         @endif
             <form action="{{ route('call.path') }}" method="POST">
              @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input value="{{ auth()->user() ? auth()->user()->firstname : old('firstname')}}" name='firstname' type="text" placeholder="Nom *" class="form-control" required>
                                         @error('firstname') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-lg-6 py-2">
                                    <input value="{{ auth()->user() ? auth()->user()->lastname : old('lastname')}}" name='lastname' type="text" placeholder="Prénom *" class="form-control" required>
                                         @error('lastname') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 pt-2">
                                        <input value="{{ auth()->user() ? auth()->user()->email : old('lastname')}}" name='email' type="email" placeholder="Email *" class="form-control" required>
                                         @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input value="{{ auth()->user() ? auth()->user()->phone : old('lastname')}}" name='phone' type="text" placeholder="contact *" class="form-control" required>
                                         @error('phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input value="{{old('subject')}}" name='subject' type="text" placeholder="Subject *" class="form-control" required>
                                         @error('subject') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                          
                            <textarea name='message'  id=""  placeholder="Message *" class="border w-100 p-3 mt-3 mt-lg-4">{{old('message')}}</textarea>
                             @error('message') <span class="error">{{ $message }}</span> @enderror
                            <div class="btn-grounp">
                                <button wire:click.prevent='submit()' type="submit" class="btn btn-info mt-2" style="display: block; width: 100%;">ENVOYER</button>
                            </div>
                        </fieldset>
                    </form>
</div>

            </div>
        </div>
    </div>
</section>
@stop