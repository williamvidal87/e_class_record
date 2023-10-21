<script >
    document.addEventListener('livewire:initialized', () => {
            
            
            
            //start restrict multi click
            function submitPoll() {
                $('button').prop('disabled', true);
            }
            for (let index = 0; index < document.getElementsByClassName("btn").length; index++) {
                document.getElementsByClassName("btn")[index].addEventListener("click", submitPoll);
            }
            //end restrict multi click
            
            $(".multi-ordering").DataTable({
            });
            
            @this.on('OpenAdminModal', (event) => {
                $('#AdminModal').modal('show');
                $('button').prop('disabled', false);
                setTimeout(function() {
                    
                    if ($.fn.DataTable.isDataTable("#multi-ordering")) {
                    $('#multi-ordering').DataTable().destroy();
                    
                    } 
                    $("#multi-ordering").DataTable({
                    });
                    }, 1);
            });
            
            @this.on('CloseAdminModal', (event) => {
                $('#AdminModal').modal('hide');
                $('button').prop('disabled', false);
                setTimeout(function() {
                    
                if ($.fn.DataTable.isDataTable("#multi-ordering")) {
                $('#multi-ordering').DataTable().destroy();
                
                } 
                
            
            
                //start restrict multi click
                function submitPoll() {
                    $('button').prop('disabled', true);
                }
                for (let index = 0; index < document.getElementsByClassName("btn").length; index++) {
                    document.getElementsByClassName("btn")[index].addEventListener("click", submitPoll);
                }
                //end restrict multi click
                
                $("#multi-ordering").DataTable({
                });
                }, 3000);
                
            });
            
            
    });
</script>
