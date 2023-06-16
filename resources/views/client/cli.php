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
                   <div class="content-wrapper">
                        <div class="col-sm-12">
                        <div class="hero-bottom-shape-two" style="background: url('assets/fifa.jpg')no-repeat bottom center"></div>
                            <div class="card" data-aos="fade-up">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1 class="font-weight-600 mb-4">
                                            LES MATCHS DU JOUR
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                            @foreach ($match      as $item)
                                                <div class="col-md-2">
                                                        <img src="{{ url('storage/images/'.$item->photo) }}" alt="" title="" class="img-fluid" />
                                                </div>
                                                    <div class="col-md-10">
                                                                <div class="">
                                                                    <h5>CHAMPIONNAT : {{$item->championnat}}, TEAM TO PLAY : {{$item->equipes}}</h5>
                                                                </div>
                                                                <div class="">
                                                                    <h5 class="">STADIUM : {{$item->stade}} ,ADRESSE : {{$item->emplacement}}</h5>
                                                                </div>
                                                                <div class="">
                                                                    <h5>DATE : {{$item->date_match}}, TIME : {{$item->heure_match}}</h5>
                                                                </div>

                                                            <a class="btn btn-primary mt-2 offset-1" href="{{ route('list.client')}}">
                                                    <span>Reserver la place</span></a><br/>


                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
