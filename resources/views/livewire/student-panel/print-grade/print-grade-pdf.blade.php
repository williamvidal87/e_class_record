<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }

        table,
        th,
        td {
            border: 1.5px solid black;
            border-collapse: collapse;
        }

        @page {
            margin-top: 0.25in;
            margin-left: 0.50in;
            margin-right: 0.50in;
            margin-bottom: 0.50in;
            size: 8.5in 13in;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .table-container {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            margin-right: 2%;
            margin-bottom: 10px;
        }

        .table-container:nth-child(2n) {
            margin-right: 0;
        }

        .vertical-text {
            display: inline-block;
            transform: rotate(-90deg);
            transform-origin: left bottom;
            white-space: nowrap;
            text-align: center;
            width: 20px; /* Adjust the width based on the length of your text */
        }

        /* Set page-break-inside to avoid for the header container */
        .header-container {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    {{--start header --}}
    <div class="clearfix header-container">
        <div style="width: 13.5%; float: left;">
            <p style="font-size: 8pt;">Form 137-T</p>
        </div>
        <div style="width: 13.5%; float: left;">
            <img src="image/logo.png" height="100" width="100">
        </div>
        <div style="width: 46%; float: left;">
            <p style="line-height: 1.6; text-align: center; font-size: 9pt;">
                Republic of the Philippines
                <br><span style="font-family: serif; font-size: 12pt; font-weight: bold;">NEGROS ORIENTAL STATE
                    UNIVERSITY</span>
                <br>Guihulngan Campus
            </p>
        </div>
        <div style="width: 27%; text-align: right; float: left;">
            <p style="font-size: 8pt;">SN: {{$Student_Number}}</p>
        </div>
    </div>
    {{-- end header --}}
    <div style="text-align: center;">
        <span style="font-family: serif; font-size: 11pt; text-decoration: underline;">STUDENT'S PERMANENT RECORD
            CARD</span>
    </div>
    <div>
        <span style="font-size: 8pt;">Name <u>{{$Student_Name}}</u></span>
    </div>
    <br>
    <div class="clearfix">
        
        @for ($x=1;$x<=4;$x++)
            <div class="table-container" style="margin-bottom: 4rem">
                <table width="100%">
                    <tr>
                        <th colspan="4"><spann style="text-decoration: underline;">1st Semester SY 2018-2019 Course: BSCS</spann></th>
                    </tr>
                    <tr>
                        <th>SUBJECTS</th>
                        <td width="20px"><span class="vertical-text" style="position: fixed;margin-left:15px;margin-top:30px;text-align: left;font-size: 7pt;">Grade</span></td>
                        <td width="20px" height="50px"><span class="vertical-text" style="position: fixed;margin-left:15px;margin-top:30px;text-align: left;font-size: 7pt;">Re-exam</span></td>
                        <td width="20px"><span class="vertical-text" style="position: fixed;margin-left:15px;margin-top:30px;text-align: left;font-size: 7pt;">Units</span></td>
                    </tr>
                    @for ($i=0;$i<13;$i++)
                        <tr>
                            <td height="20px"><span style="font-size: 7.7pt;">NSTP 1-AFROTC S - National Service Training Program 1</span></td>
                            <td><span style="font-size: 8pt;">2.20</span></td>
                            <td><span style="font-size: 8pt;"> </span></td>
                            <td><span style="font-size: 8pt;">2.10</span></td>
                        </tr>
                    @endfor
                </table>
            </div>
        @endfor
    </div>
    <div style="position: fixed;margin-top:50px" class="clearfix">
        <i style="font-size: 7pt;margin-left:20px">This is to certify that this is a true record of who had been enrolled in 	this Educational Institution in the semester as indicated above.</i>
        <span style="font-size: 7pt;">Posted By:___________________________________________________________</span>
        <span style="font-size: 7pt;">Approved By:_________________________________________________________</span>
        <span style="font-size: 7pt;">Verified By:___________________________________________________________</span>
        <span style="font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            University Registrar
        </span>
    </div>
</body>

</html>
