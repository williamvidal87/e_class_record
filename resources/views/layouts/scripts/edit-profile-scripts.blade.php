<script >
    document.addEventListener('livewire:initialized', () => {
        
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
