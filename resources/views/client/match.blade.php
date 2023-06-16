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
  <!--our blog section start-->
  <section class="our-blog-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center">
                            <h2>Our Latest News</h2>
                            <p>
                                Le football est une histoire de cycles.Si vous avez tout gagné avec une équipe,vous devez en changer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($match      as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="single-blog-card card border-0 shadow-sm mt-4">
                            <div class="blog-img position-relative">
                                <img src="{{ url('storage/images/'.$item->photo) }}" class="card-img-top" alt="blog">
                                <div class="meta-date">
                                    <!-- <strong>24</strong>
                                    <small>Apr</small> -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="post-meta mb-2">
                                    <ul class="list-inline meta-list">
                                        <li class="list-inline-item"><i class="fas fa-heart mr-2"></i><span>45</span>
                                            Comments
                                        </li>
                                        <li class="list-inline-item"><i class="fas fa-share-alt mr-2"></i><span>10</span>
                                            Share
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="h5 mb-2 card-title"><a href="#">CHAMPIONNAT : {{$item->championnat}}, TEAM TO PLAY : {{$item->equipes}}</a></h3>
                                <p class="card-text">STADIUM : {{$item->stade}}</p>
                                <p class="card-text">ADRESSE : {{$item->emplacement}}</p>
                                <p class="card-text">PRIX D'ENTREE : {{$item->prix}}{{$item->devise}}</p>
                                <p class="card-text">DATE : {{$item->date_match}}, TIME : {{$item->heure_match}}</p>
                                <a href="{{ route('list.client')}}" class="detail-link">Reserver la place <span class="ti-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--our blog section end-->

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
