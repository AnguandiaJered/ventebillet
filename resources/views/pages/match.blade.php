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
                                            <h5 id="exampleModalLabel" class="modal-title">Paramètrage des matchs</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body col-md-12">						
                                            <form id="forme" method="POST" action="{{ route('match.store')}}" class="form-horizontal col-md-12" autocomplete="off">	
                                            @csrf									
                                                <div class="row">
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="stade_id">selectionner le stade</label>
                                                            <select class="form-control" name="stade_id">
                                                                <option selected="">Choose...</option>
                                                                @foreach ($stade as $item)																				
																<option value="{{$item->id}}">{{$item->nom}}</option>
																@endforeach	                                                            
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="champions_id">selectionner le championnat</label>
                                                            <select class="form-control" name="champions_id">
                                                                <option selected="">Choose...</option>                                                               												
                                                                @foreach ($champions as $item)																				
																<option value="{{$item->id}}">{{$item->name}}</option>
																@endforeach	                                      
                                                            </select>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="equipe_principale">selectionner l'equipe principale</label>
                                                            <select class="form-control" name="equipe_principale">
                                                                <option selected="">Choose...</option>                                                               												
                                                                @foreach ($equipe as $item)																				
																<option value="{{$item->name}}">{{$item->name}}</option>
																@endforeach	                                     
                                                            </select>
                                                        </div>                                                                                                                                                   
                                                    </div> 
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="equipe_adverse">selectionner l'equipe adverse</label>
                                                            <select class="form-control" name="equipe_adverse">
                                                                <option selected="">Choose...</option>                                                               												
                                                                @foreach ($equipe as $item)																				
																<option value="{{$item->name}}">{{$item->name}}</option>
																@endforeach	                                      
                                                            </select>
                                                        </div>                                                     
                                                        <div class="form-group">
                                                            <label for="date_match">Entré la date du match</label>
                                                            <input type="date" class="form-control" name='date_match' required />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="heure_match">Entré l'heure du match</label>
                                                            <input type="time" class="form-control" name='heure_match' required />
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
                            <a href="{{ route('reportmatch') }}" target="_blank" rel="noopener noreferrer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des matchs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Stade</th>
                                            <th>championnat</th>
                                            <th>Equipe Principale</th>
                                            <th>Equipe Adverse</th>
                                            <th>Date du match</th>
                                            <th>Heure du match</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Stade</th>
                                            <th>championnat</th>
                                            <th>Equipe Principale</th>
                                            <th>Equipe Adverse</th>
                                            <th>Date du match</th>
                                            <th>Heure du match</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($match as $item)
                                        <div id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 id="exampleModalLabel" class="modal-title">Paramètrage des matchs</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body col-md-12">						
                                                        <form id="forme" method="POST" action="{{ route('match.update')}}" class="form-horizontal col-md-12" autocomplete="off">	
                                                        @csrf	
                                                        <input type="hidden" name="id" id="id" value="{{$item->id}}" class="form-control" required/>								
                                                            <div class="row">
                                                                <div class="col-md-6 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="stade_id">selectionner le stade</label>
                                                                        <select class="form-control" name="stade_id" value="{{$item->stade_id}}">                                                                         																				
                                                                            <option value="{{$item->stade_id}}">{{$item->stade_id}}</option>                                                                                                                                      
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="champions_id">selectionner le championnat</label>
                                                                        <select class="form-control" name="champions_id" value="{{$item->champions_id}}">                                                                       																			
                                                                            <option value="{{$item->champions_id}}">{{$item->champions_id}}</option>                                                                                                                
                                                                        </select>
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <label for="equipe_principale">selectionner l'equipe principale</label>
                                                                        <input type="text" class="form-control" name='equipe_principale' value="{{$item->equipe_principale}}" required />
                                                                    </div>                                                                                                                                                   
                                                                </div> 
                                                                <div class="col-md-6 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="equipe_adverse">selectionner l'equipe adverse</label>
                                                                        <input type="text" class="form-control" name='equipe_adverse' value="{{$item->equipe_adverse}}" required />
                                                                    </div>                                                     
                                                                    <div class="form-group">
                                                                        <label for="date_match">Entré la date du match</label>
                                                                        <input type="date" class="form-control" name='date_match' value="{{$item->date_match}}" required />
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label for="heure_match">Entré l'heure du match</label>
                                                                        <input type="time" class="form-control" name='heure_match' value="{{$item->heure_match}}" required />
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
                                            <td>{{$item->nom}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->equipe_principale}}</td>
                                            <td>{{$item->equipe_adverse}}</td>
                                            <td>{{$item->date_match}}</td>
                                            <td>{{$item->heure_match}}</td>
                                            <!-- <td>
                                                <a data-toggle="modal" data-target="#edit{{$item->id}}" href="{{'/match/'.$item->id}}".$id><i class="fa fa-edit"></i></a>
                                                <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="{{'/match/'.$item->id}}" class="ml-3"><i class="fa fa-trash"></i></a>                                                        
                                            </td>  -->
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