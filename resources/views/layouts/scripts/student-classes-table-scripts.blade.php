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
        });
        
        @this.on('OpenViewStudentClassesModal', (event) => {
            $('#StudentClassesModal').modal('show');
        });
        
        @this.on('CloseViewStudentClassesModal', (event) => {
            $('#StudentClassesModal').modal('hide');
        });
        
        @this.on('OpenViewClassRecordModal', (event) => {
            $('#ViewClassRecordModal').modal('show');
        });
        
        @this.on('CloseViewClassRecordModal', (event) => {
            $('#ViewClassRecordModal').modal('hide');
        });

        
    });
</script>
