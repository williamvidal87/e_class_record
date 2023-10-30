<script >
    document.addEventListener('livewire:init', () => {
        $(".multi-ordering").DataTable({
        });
        //start restrict multi click
        function submitPoll() {
            $('button').prop('disabled', true);
        }
        for (let index = 0; index < document.getElementsByClassName("btn").length; index++) {
            document.getElementsByClassName("btn")[index].addEventListener("click", submitPoll);
        }
        //end restrict multi click
    });
    
    document.addEventListener('livewire:initialized', () => {
        @this.on('DispatchTable', (event) => {
            $('button').prop('disabled', false);
            setTimeout(function() {
                    $('.multi-ordering').DataTable().destroy();
                    $(".multi-ordering").DataTable({
                    });
                    //start restrict multi click
                    function submitPoll() {
                        $('button').prop('disabled', true);
                    }
                    for (let index = 0; index < document.getElementsByClassName("btn").length; index++) {
                        document.getElementsByClassName("btn")[index].addEventListener("click", submitPoll);
                    }
                    //end restrict multi click
            }, 1);
        });
        
        @this.on('OpenStudentModal', (event) => {
            $('#StudentModal').modal('show');
        });
        
        @this.on('CloseStudentModal', (event) => {
            $('#StudentModal').modal('hide');
        });
        
        @this.on('DeleteConfirm', (UserID) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    Livewire.dispatch('Deleted',UserID),
                    swal('Deleted!', 'Your file has been deleted!', 'success')
                }
            }).catch(swal.noop)
        });
        
        @this.on('alert_store', (event) => {
            toastr.success("successfully stored!");
        });
        @this.on('alert_update', (event) => {
            toastr.info("successfully updated!");
        });
        @this.on('alert_delete', (event) => {
            toastr.error("successfully deleted!");
        });
    });
</script>
