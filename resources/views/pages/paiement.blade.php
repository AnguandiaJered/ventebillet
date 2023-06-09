<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.partials.header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.partials.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm offset-10 mb-4"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Ajouter Client</a>
                   -->
                        <div class="col-md-12 col-sm-12 text-right">
							<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3 mb-4">Effectuer l'opération</button>
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							    <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Paramètrage des paiements</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body col-md-12">
                                            <form id="forme" method="POST" action="{{ route('paiement.store')}}" class="form-horizontal col-md-12" autocomplete="off">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="form-group">
                                                            <label for="vente_id">selectionner la vente</label>
                                                            <select class="form-control" name="vente_id">
                                                                <option selected="">Choose...</option>
                                                                @foreach ($client as $item)
																<option value="{{$item->id}}">{{$item->nom}}</option>
																@endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="montant">Entré le montant</label>
                                                            <input type="number" class="form-control" name='montant' required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="devise">selectionner la devise</label>
                                                            <select class="form-control" name="devise">
                                                                <option selected="">Choose...</option>
                                                                <option value="$">USD</option>
                                                                <option value="FC">FC</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary col-md-5 mt-2" value="Enregistrer" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
                    <!-- DataTales Example -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <a href="{{ route('reportpaiement') }}" target="_blank" rel="noopener noreferrer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des paiements</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vente</th>
                                            <th>Montant</th>
                                            <th>Devise</th>
                                            <th>Date Paiement</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vente</th>
                                            <th>Montant</th>
                                            <th>Devise</th>
                                            <th>Date Paiement</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($paiement as $item)
                                        <div id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 id="exampleModalLabel" class="modal-title">Paramètrage des paiements</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body col-md-12">
                                                        <form id="forme" method="POST" action="{{ route('paiement.update')}}" class="form-horizontal col-md-12" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{$item->id}}" class="form-control" required/>
                                                            <div class="row">
                                                                <div class="col-md-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="vente_id">selectionner la vente</label>
                                                                        <select class="form-control" name="vente_id" value="{{$item->vente_id}}">
                                                                            <option value="{{$item->vente_id}}">{{$item->vente_id}}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="montant">Entré le montant</label>
                                                                        <input type="number" class="form-control" name='montant' value="{{$item->montant}}" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="devise">selectionner la devise</label>
                                                                        <select class="form-control" name="devise" value="{{$item->devise}}">
                                                                            <!-- <option selected="">Choose...</option>  -->
                                                                            <option value="$">USD</option>
                                                                            <option value="FC">FC</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary col-md-5 mt-2" value="Modifier" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tr>
                                            <div class="modal fade" id="edit{{$item->id}}">
                                                <div class="modal-dialog modal-success">
                                                    <div class="modal-content">
                                                        <div class="modal-header" >
                                                        <h3>Editer</h3><button class="btn btn-danger" data-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nom}}</td>
                                            <td>{{$item->montant}}</td>
                                            <td>{{$item->devise}}</td>
                                            <td>{{$item->datepaie}}</td>
                                            <td>
                                                <!-- <a data-toggle="modal" data-target="#edit{{$item->id}}" href="{{'/paiement/'.$item->id}}".$id><i class="fa fa-edit"></i></a> -->
                                                <a href="{{'report-billet/'.$item->id}}".$id target="_blank" rel="noopener noreferrer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                    class="fas fa-print fa-sm text-white-50"></i> Print Ticket</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
