<x-app-layout>
    @section("css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0-2/css/all.min.css" integrity="sha512-uNOFYDWi8Y7/BN/9S2QDx/BVTEvSwdrZ53NHLgt+fDTdyQeOwmBpHrLrxOT3TQn78H0QKJWLvD7hsDOZ9Gk45A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('simple-iconpicker.min.css') }}" rel="stylesheet">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter une nouvelle ressource
        </h2>
    </x-slot>

    <div class="container mt-5 ">
        <div class="row">
            <div class="col-6 bg-light pt-12 ">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="post" action="{{route("addRessourcePost")}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Libellé</label>
                      <input type="text" name="libele" class="form-control" id="exampleFormControlInput1" >
                      @if ($errors->has('libele'))
                      <div class="error">
                          {{ $errors->first('libele') }}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Url</label>
                        <input type="url" name="url" class="form-control" id="exampleFormControlInput2" >
                        @if ($errors->has('url'))
                        <div class="error">
                            {{ $errors->first('url') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @if ($errors->has('description'))
                        <div class="error">
                            {{ $errors->first('description') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mb-4">Enregistrer</button>
                  </form>

            </div>

        </div>
        <div class="d-flex justify-content-start">
            <a href="{{ route('dashboard')}}" class="mt-2 ">Retour</a>
            </div>
    </div>

    @section('script')
    <script src="{{ asset('simple-iconpicker.min.js') }}"></script>
    <script type="text/javascript">
      $('.demo').iconpicker(".demo");


      </script>
    @endsection
</x-app-layout>
