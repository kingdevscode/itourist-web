<script type="text/javascript">
    function deleteConfirmation(link){

        new swal({
                title:'Supprimer une ville',
                text:'Voulez-vous vraiment supprimer cette ville?',
                type:'error',
                confirmButtonText: '<a href="'+link+'" style="text-decoration: none; color: #fff;">Confirmer </a>',
                confirmButtonColor: '#d33',
                showCancelButton: true,
                cancelButtonText: 'Annuler'
        });
    }
</script>
