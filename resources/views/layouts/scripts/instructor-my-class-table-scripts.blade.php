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
                    $('.multi-ordering2').DataTable().destroy();
                    $(".multi-ordering2").DataTable({
                    });
                    //start restrict multi click
                    function submitPoll() {
                        $('button').prop('disabled', true);
                    }
                    for (let index = 0; index < document.getElementsByClassName("btn").length; index++) {
                        document.getElementsByClassName("btn")[index].addEventListener("click", submitPoll);
                    }
                    //end restrict multi click
            }, 1000);
            $('#semester_id').select2({
            dropdownParent: $('#MyClassModal'),
            });
            $('#semester_id').on('change', function (e) {
                var semester_id = $('#semester_id').select2("val");
                Livewire.dispatch('Selected_semester',({ semester_id }));
            });
            $('#subject_id').select2({
            dropdownParent: $('#MyClassModal'),
            });
            $('#subject_id').on('change', function (e) {
                var subject_id = $('#subject_id').select2("val");
                Livewire.dispatch('Selected_subject',({ subject_id }));
            });
        });
        
        @this.on('Refresh_semester_id', (semester_id) => {
            $("#semester_id").select2("val", semester_id);
        });
        
        @this.on('Refresh_subject_id', (subject_id) => {
            $("#subject_id").select2("val", subject_id);
        });
        
        @this.on('OpenMyClassModal', (event) => {
            $('#MyClassModal').modal('show');
        });
        
        @this.on('CloseMyClassModal', (event) => {
            $('#MyClassModal').modal('hide');
        });
        
        @this.on('OpenViewMyClassModal', (event) => {
            $('#ViewMyClassModal').modal('show');
        });
        
        @this.on('CloseViewMyClassModal', (event) => {
            $('#ViewMyClassModal').modal('hide');
        });
        
        @this.on('OpenAddStudentModal', (event) => {
            $('#AddStudentModal').modal('show');
        });
        
        @this.on('CloseAddStudentModal', (event) => {
            $('#AddStudentModal').modal('hide');
        });
        
        @this.on('DeleteConfirm', (MyClassID) => {
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
                    Livewire.dispatch('Deleted',MyClassID),
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
