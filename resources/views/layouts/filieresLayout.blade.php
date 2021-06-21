
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Filieres</h1>
          </div>
          @isset ($success)
            <div class="alert alert-success alert-dismissible fade show col-sm-8" role="alert" style="margin-bottom: -15px; width: 50px; background-color: rgba(41, 199, 101, 0.795)">
                <strong>Success !!</strong> {{ $success }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endisset

        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-10" style="margin-top: 10px">
                    <h3 class="card-title">Liste des Filieres</h3>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-type="ajout" data-toggle="modal" data-target="#filieresmodal"><i class="fa fa-plus"></i> Ajouter</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>NomFiliere </th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($filieres as $filiere)
                    <tr>
                        <td style="padding-top:17px;"> {{ $filiere->id}} </td>
                        <td style="padding-top:17px;">{{ $filiere->NomFiliere }}</td>
                       
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-id="{{ $filiere->id }} "
                                    data-NomFiliere="{{ $filiere->NomFiliere}}"
                                    data-toggle="modal"
                                    data-target="#filieresmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-id="{{ $filiere->id}} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    @endforeach

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Voulez-vous vraiment supprimer cette Filiere ?
        </div>
        <form action="{{route('filieresDelete')}}" method="post">
            @csrf
            <input type="hidden" id="id" name="id">
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="filieresmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrement Filieres</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                  <form id="form" method="POST" action="">
                      @csrf
                      @method('post')

                      <input type="hidden" id="Oldid" name="Oldid">
                      <div class="row">
                            <div class="form-group col-md-4">
                              <label for="id" class="col-form-label">Identifiant</label>
                              <input type="text" class="form-control" name="id" id="id">
                            </div>
                          
                            <div class="form-group col-md-4">
                              <label for="nom" class="col-form-label">Nom de la Filiere</label>
                              <input type="text" class="form-control" name="NomFiliere" id="NomFiliere">
                            </div>
                            
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="envoyer" id="submit" class="btn btn-primary">Send message</button>
                      </div>
                  </form>
              </div>
            </div>

      </div>
    </div>
  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){

        $('#filieresmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer une filiere');
            $('#id').val('');
            $('#NomFiliere').val('');
            
           

           //Changement de la route dans l'action du formulaire
            $("#form").attr('action', "{{route('filieresSave')}}");
        } else {
        $('.modal-title').text('Modifier les informations d\'une filiere');
        var id = button.data('id');
        var NomFiliere = button.data('NomFiliere');
        
        

        $('#id').val(id);
        $('#Oldid').val(id);
        $('#NomFiliere').val(NomFiliere);
        
        

        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updateFilieres', " + id + ")}}");
      }


    })

    //Fonction permettant d'ouvrir le modal de confirmation pour la suppression
    $('#confirm-modal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      $('.modal-title').text('Confirmation');
      $('#id').val(id);
    })
    
    });

    
    //Fonction de validation des champs du formulaire à adapter en fonction des 
    //champs du formulaire
    $(function(){
        $('#form').validate({

        rules: {
        id: {
            required: true
        },
        NomFiliere: {
            required: true
        },
       
        },
        messages: {
            id: {
                required: "Le matricule est requis !",
            },
            NomFiliere: {
                required: "Le nom est requis !",
            },
            
            
           
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');

        },
        unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
        });
    })

   
</script>