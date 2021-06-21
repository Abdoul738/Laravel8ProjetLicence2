
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Enseignants</h1>
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
                    <h3 class="card-title">Liste des Enseignants</h3>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-type="ajout" data-toggle="modal" data-target="#enseignantsmodal"><i class="fa fa-plus"></i> Ajouter</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>Nom </th>
                  <th>Prénom (s)</th>
                  <th>Adresse</th>
                  <th>Telephone</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($enseignants as $enseignant)
                    <tr>
                        <td style="padding-top:17px;"> {{ $enseignant->id}} </td>
                        <td style="padding-top:17px;">{{ $enseignant->NomEnseignant }}</td>
                        <td style="padding-top:17px;">{{ $enseignant->PrenomEnseignant }}</td>
                        <td style="padding-top:17px;">{{ $enseignant->Adresse }}</td>
                        <td style="padding-top:17px;">{{ $enseignant->Telephone }}</td>
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-id="{{ $enseignant->id }} "
                                    data-NomEnseignant="{{ $enseignant->NomEnseignant}}"
                                    data-PrenomEnseignant="{{ $enseignant->PrenomEnseignant }}"
                                    data-Adresse="{{ $enseignant->Adresse}}"
                                    data-Telephone="{{ $enseignant->Telephone}}"
                                    data-toggle="modal"
                                    data-target="#enseignantsmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-id="{{ $enseignant->id}} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer cet Enseignant ?
        </div>
        <form action="{{route('enseignantsDelete')}}" method="post">
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

  <div class="modal fade" id="enseignantsmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrement Enseignant</h5>
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
                              <label for="nom" class="col-form-label">Nom</label>
                              <input type="text" class="form-control" name="NomEnseignant" id="NomEnseignant">
                            </div>
                            
                        </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="PrenomEnseignant" class="col-form-label">Prenom</label>
                          <input type="text" class="form-control" name="PrenomEnseignant" id="PrenomEnseignant">
                        </div>
                        
                        <div class="form-group col-md-4">
                          <label for="Adresse" class="col-form-label">Adresse</label>
                          <input type="text" class="form-control" name="Adresse" id="Adresse">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="Telephone" class="col-form-label">Telephone</label>
                          <input type="text" class="form-control" name="Telephone" id="Telephone">
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

        $('#enseignantsmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer un enseignant');
            $('#id').val('');
            $('#NomEnseignant').val('');
            $('#PrenomEnseignant').val('');
            $('#Adresse').val('');
            $('#Telephone').val('');
           

           //Changement de la route dans l'action du formulaire
            $("#form").attr('action', "{{route('enseignantsSave')}}");
        } else {
        $('.modal-title').text('Modifier les informations d\'un enseignant');
        var id = button.data('id');
        var NomEnseignant = button.data('NomEnseignant');
        var PrenomEnseignant = button.data('PrenomEnseignant');
        var Adresse = button.data('Adresse');
        var Telephone = button.data('Telephone');
        

        $('#id').val(id);
        $('#Oldid').val(id);
        $('#NomEnseignant').val(NomEnseignant);
        $('#PrenomEnseignant').val(PrenomEnseignant);
        $('#Adresse ').val(Adresse );
        $('#Telephone').val(Telephone);
        

        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updateEnseignants', " + id + ")}}");
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
        NomEnseignant: {
            required: true
        },
        PrenomEnseignant: {
            required: true
        },
        Adresse: {
            required: true
        },
        Telephone: {
            required: true
        },
       
        
        
        },
        messages: {
            id: {
                required: "Le matricule est requis !",
            },
            NomEnseignant: {
                required: "Le nom est requis !",
            },
            PrenomEnseignant: {
                required: "Le prenom est requis !",
            },
            Adresse: {
                required: "La date de naissance fournie !",
            },
            Telephone: {
                required: "L'adresse doit être fournie !",
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