
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Matieres</h1>
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
                    <h3 class="card-title">Liste des Matieres</h3>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-type="ajout" data-toggle="modal" data-target="#matieresmodal"><i class="fa fa-plus"></i> Ajouter</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>NomMatiere </th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($matiere as $matiere)
                    <tr>
                        <td style="padding-top:17px;"> {{ $matiere->id}} </td>
                        <td style="padding-top:17px;">{{ $matiere->NomMatiere }}</td>
                       
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-id="{{ $matiere->id }} "
                                    data-NomMatiere="{{ $matiere->NomMatiere}}"
                                    data-toggle="modal"
                                    data-target="#matieresmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-id="{{ $matiere->id}} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer cette Matiere ?
        </div>
        <form action="{{route('matieresDelete')}}" method="post">
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

  <div class="modal fade" id="matieresmodal" tabindex="-1" role="dialog">
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
                              <label for="nom" class="col-form-label">Nom de la Matiere</label>
                              <input type="text" class="form-control" name="NomMatiere" id="NomMatiere">
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

        $('#matieresmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer une matiere');
            $('#id').val('');
            $('#NomMatiere').val('');
            
           

           //Changement de la route dans l'action du formulaire
            $("#form").attr('action', "{{route('matieresSave')}}");
        } else {
        $('.modal-title').text('Modifier les informations d\'une matiere');
        var id = button.data('id');
        var NomMatiere = button.data('NomMatiere');
        
        

        $('#id').val(id);
        $('#Oldid').val(id);
        $('#NomMatiere').val(NomMatiere);
        
        

        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updateMatieres', " + id + ")}}");
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
        NomMatiere: {
            required: true
        },
       
        },
        messages: {
            id: {
                required: "Le matricule est requis !",
            },
            NomMatiere: {
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