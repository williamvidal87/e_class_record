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
            $('#student_id').select2({
            dropdownParent: $('#AddStudentModal'),
            });
            $('#student_id').on('change', function (e) {
                var student_id = $('#student_id').select2("val");
                Livewire.dispatch('Selected_student',({ student_id }));
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
        
        @this.on('OpenAddActivityCategoryModal', (event) => {
            $('#AddActivityCategoryModal').modal('show');
        });
        
        @this.on('CloseAddActivityCategoryModal', (event) => {
            $('#AddActivityCategoryModal').modal('hide');
        });
        
        @this.on('OpenClassWorkMidTermModal', (event) => {
            $('#ClassWorkMidTermModal').modal('show');
        });
        
        @this.on('CloseClassWorkMidTermModal', (event) => {
            $('#ClassWorkMidTermModal').modal('hide');
        });
        
        @this.on('OpenMidtermActivityModal', (event) => {
            $('#MidTermActivityModal').modal('show');
        });
        
        @this.on('CloseMidtermActivityModal', (event) => {
            $('#MidTermActivityModal').modal('hide');
        });
        
        @this.on('OpenViewMidtermActivityRecordModal', (event) => {
            $('#ViewMidtermActivityRecordModal').modal('show');
        });
        
        @this.on('CloseViewMidtermActivityRecordModal', (event) => {
            $('#ViewMidtermActivityRecordModal').modal('hide');
        });
        
        @this.on('OpenAddFinalActivityCategoryModal', (event) => {
            $('#AddFinalActivityCategoryModal').modal('show');
        });
        
        @this.on('CloseAddFinalActivityCategoryModal', (event) => {
            $('#AddFinalActivityCategoryModal').modal('hide');
        });
        
        @this.on('OpenClassWorkFinalTermModal', (event) => {
            $('#ClassWorkFinalTermModal').modal('show');
        });
        
        @this.on('CloseClassWorkFinalTermModal', (event) => {
            $('#ClassWorkFinalTermModal').modal('hide');
        });
        
        @this.on('OpenFinaltermActivityModal', (event) => {
            $('#FinalTermActivityModal').modal('show');
        });
        
        @this.on('CloseFinaltermActivityModal', (event) => {
            $('#FinalTermActivityModal').modal('hide');
        });
        
        @this.on('OpenViewFinaltermActivityRecordModal', (event) => {
            $('#ViewFinaltermActivityRecordModal').modal('show');
        });
        
        @this.on('CloseViewFinaltermActivityRecordModal', (event) => {
            $('#ViewFinaltermActivityRecordModal').modal('hide');
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
        
        @this.on('RemoveConfirm', (ClassStudentID) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Removed it!',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    Livewire.dispatch('Removed',ClassStudentID),
                    swal('Removed!', 'Your student has been removed!', 'success')
                }
            }).catch(swal.noop)
        });
        
        @this.on('RemoveActivityCategoryConfirm', (ActivityCategoryID) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Removed it!',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    Livewire.dispatch('RemovedActivityCategory',ActivityCategoryID),
                    swal('Removed!', 'This Activity category has been removed!', 'success')
                }
            }).catch(swal.noop)
        });
        
        @this.on('RemoveFinalActivityCategoryConfirm', (FinalActivityCategoryID) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Removed it!',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    Livewire.dispatch('RemovedFinalActivityCategory',FinalActivityCategoryID),
                    swal('Removed!', 'This Activity category has been removed!', 'success')
                }
            }).catch(swal.noop)
        });
        
        @this.on('DeleteConfirmMidtermActivity', (MidTermActivityID) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Removed it!',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    Livewire.dispatch('DeletedMidtermActivity',MidTermActivityID),
                    swal('Removed!', 'This Activity has been removed!', 'success')
                }
            }).catch(swal.noop)
        });
        
        @this.on('DeleteConfirmFinaltermActivity', (FinalTermActivityID) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Removed it!',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    Livewire.dispatch('DeletedFinaltermActivity',FinalTermActivityID),
                    swal('Removed!', 'This Activity has been removed!', 'success')
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
        @this.on('alert_removed', (event) => {
            toastr.error("successfully removed!");
        });
    });
</script>
