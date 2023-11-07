<script >
    document.addEventListener('livewire:initialized', () => {
        
        $('#course_id').select2();
        
        $('#course_id').on('change', function (e) {
            var course_id = $('#course_id').select2("val");
            Livewire.dispatch('Selected_course',({ course_id }));
        });
        
        @this.on('Refresh_course_id', (course_id) => {
            $("#course_id").select2("val", course_id);
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
