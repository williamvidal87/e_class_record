@if(Auth::user()->rule_id==3)
    <livewire:student-panel.print-grade.print-grade-button />
@endif
@if(Auth::user()->rule_id==1)
    <livewire:admin-panel.generate-report.generate-button />
@endif
<footer class="footer footer-static footer-light navbar-border navbar-shadow" style="position: fixed;bottom: 0;width: 100%;">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">2023 &copy; Copyright <a
                class="text-bold-800 grey darken-2" href="https://www.facebook.com/groups/150254361833930"
                target="_blank">NORSU-Guihulngan Campus</a></span>
    </div>
</footer>