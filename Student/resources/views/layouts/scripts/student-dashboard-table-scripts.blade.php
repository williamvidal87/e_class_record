<script >
    document.addEventListener('livewire:init', () => {
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
        
        @this.on('OpenViewGradeModal', (event) => {
            $('#ViewGradeModal').modal('show');
        });
        
        @this.on('CloseViewGradeModal', (event) => {
            $('#ViewGradeModal').modal('hide');
        });
        
        @this.on('OpenJoinClassCodeModal', (event) => {
            $('#JoinClassCodeModal').modal('show');
        });
        
        @this.on('CloseJoinClassCodeModal', (event) => {
            $('#JoinClassCodeModal').modal('hide');
        });
        
        @this.on('alert_joined', (event) => {
            toastr.success("successfully joined!");
        });

    });
</script>
