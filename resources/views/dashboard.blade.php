<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mt-5">
                        <h2 class="mb-4">Ressources</h2>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('addRessource')}}" class="mb-4 btn btn-primary">Ajouter</a>
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Libellé</th>
                                    <th>Url</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('script')
    <script type="text/javascript">
        $(function () {

          var table = $('.yajra-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('ressources.list') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'libele', name: 'libele'},
                  {data: 'url', name: 'url'},
                  {data: 'description', name: 'description'},
                  //{data: 'status', name: 'status'},
                  {
                      data: 'action',
                      name: 'action',
                      orderable: true,
                      searchable: true
                  },
              ]
          });

        });
      </script>
    @endsection
</x-app-layout>
