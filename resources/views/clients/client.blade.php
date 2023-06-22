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
                <div class="card o-hidden border-0 shadow-lg my-5">

            <div class="card-body p-0">
                    <!-- Page Heading -->
                    <h1 class="font-weight-600 mb-4 mt-2 ml-3">Veuillez completer votre Identité SVP</h1>
                                            <form id="forme" method="POST" action="{{ route('reservation.client')}}" class="form-horizontal col-md-12" autocomplete="off">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="form-group">
                                                            <label for="nom">Entré noms</label>
                                                            <input type="text" class="form-control" name='nom' value="{{Auth::user()->name}}" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="moderateur">Entré l'adresse</label>
                                                            <input type="text" class="form-control" name='adresse' required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="telephone">Entré le contact</label>
                                                            <input type="tel" class="form-control" name='telephone' value="{{Auth::user()->phone}}" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mail">Entré le mail</label>
                                                            <input type="email" class="form-control" name='mail' value="{{Auth::user()->email}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <a href="{{ route('reservation.match')}}" class="detail-link btn btn-primary col-md-3 mt-2">Come back !<span class="ti-arrow-right"></span></a>
                                                    <input type="submit" class="btn btn-primary col-md-3 mt-2" value="Suivant" />                                                  
                                                </div>
                                            </form>
                                            
                </div>
                </div>
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
