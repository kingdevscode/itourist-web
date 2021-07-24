<script type="text/javascript">

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    function deleteConfirmation(link,item){

        new swal({
                title:'Supprimer '+item,
                text:'Voulez-vous vraiment supprimer ?',
                icon:'warning',
                confirmButtonText: '<a href="'+link+'" style="text-decoration: none; color: #fff;">Confirmer </a>',
                confirmButtonColor: '#d33',
                showCancelButton: true,
                cancelButtonText: 'Annuler'
        });
    }
</script>
