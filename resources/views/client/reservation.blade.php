<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.partials.header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="font-weight-600 mb-4 mt-2 ml-3">Veuillez completer votre Identité SVP</h1>

                                            <form id="forme" method="POST" action="{{ route('reservation')}}" class="form-horizontal col-md-12" autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="form-group">
                                                            <label for="client_id">selectionner le client</label>
                                                            <select class="form-control" name="client_id">
                                                                <option selected="">Choose...</option>
                                                                @foreach ($client as $item)
																<option value="{{$item->id}}">{{$item->nom}}</option>
																@endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="match_id">selectionner le match</label>
                                                            <select class="form-control" name="match_id">
                                                                <option selected="">Choose...</option>
                                                                @foreach ($matchs as $item)
																<option value="{{$item->id}}">{{$item->equipes}}</option>
																@endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prix">Entré le prix</label>
                                                            <input type="number" class="form-control" name='prix' required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="place_id">selectionner le numero de place</label>
                                                            <select class="form-control" name="place_id">
                                                                <option selected="">Choose...</option>
                                                                @foreach ($zonesiege as $item)
																<option value="{{$item->id}}">{{$item->numsiege}}</option>
																@endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary col-md-5 mt-2" value="Enregistrer" />
                                                </div>
                                            </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('layouts.partials.scripts')

</body>

</html>
